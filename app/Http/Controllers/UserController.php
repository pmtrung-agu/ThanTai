<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Address;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthController;
use Image;
use Validator;
use Redirect;

class UserController extends Controller {
    private static $roles = array('Admin', 'Manager', 'Seller', 'Customer');

    function __construct(){
      if(!AuthController::checkAuth()) return view('welcome');
    }

    static function getRoles(){
      return self::$roles;
    }
    //
    function list(){
      $users = User::orderBy('updated_at','desc')->get()->toArray();
      return view('Admin.User.list', ['users' => $users]);
    }

    function add(){
      $address = Address::where('matructhuoc', 'exists', false)->orWhere('matructhuoc', '=', '')->get();
      //$file = Storage::get('photos/20180122162528_5a661078ac89b.jpg');
      return view('Admin.User.add', ['address' => $address, 'roles' => self::$roles]);
    }

    function create(Request $request){
      $validator = Validator::make($request->all(), [
        'email' => 'required|unique:users',
        'slug' => 'required|unique:users',
        'name' => 'required',
        'phone' => 'required',
        'address.0' => 'required','address.1' => 'required','address.2' => 'required','address.3' => 'required',
        'roles' => 'required'
     ]);
      if ($validator->fails()) {
        return redirect(env('APP_URL').'admin/user/add')->withErrors($validator)->withInput();
      }
      $data = $request->all();
      $user = new User();
      $user->name = $data['name'];
      $user->email = $data['email'];
      $user->password = Hash::make($data['password']);
      $user->roles = isset($data['roles']) ? $data['roles'] : '';
      $user->phone = $data['phone'];
      $user->address = $data['address'];
      $user->active = isset($data['active']) ? intval($data['active']) : 0;
      $user->store = isset($data['store']) ? $data['store'] : '';
      $user->slug = isset($data['slug']) ? $data['slug'] : '';
      $user->website = isset($data['website']) ? $data['website'] : '';
      $arr_photo = array();
      if(isset($data['hinhanh_aliasname'])){
        foreach($data['hinhanh_aliasname'] as $key => $value){
          array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
        }
      }
      $user->photos = $arr_photo;
      $user->gioi_thieu = isset($data['gioi_thieu']) ? $data['gioi_thieu'] : '';
      $user->save();
      return redirect()->intended(env('APP_URL').'admin/user');
    }

    function register(Request $request){
        $data = $request->all();
        $validator = Validator::make($request->all(), [
          'email' => 'required|email|unique:users',
        ]);
        if ($validator->fails()) {
          //return redirect('register')->withErrors($validator)->withInput();
          echo 'Địa chỉ email đã tồn tại, vui lòng chọn địa chỉ khác.';
        } else if($data['password'] != $data['confirm_password']){
          echo 'Mật khẩu không trùng khớp.';
        } else {
          $user = new User();
          $user->name = $data['email'];
          $user->email = $data['email'];
          $user->password = Hash::make($data['password']);
          $user->roles = array('Customer');
          $user->phone = '';
          $user->address = '';
          $user->active = 1;
          $arr_photo = array();
          $user->photos = '';
        if($user->save()) {
           echo 'Đăng ký thành công, vui lòng đăng nhập để giao dịch nhanh chóng.';
        } else {
          echo 'Đăng ký thất bại.';
        }
      }
    }

    function edit(Request $request, $id = null){
      $address = Address::where('matructhuoc', 'exists', false)->orWhere('matructhuoc', '=', '')->get();
      $destination = $request->get('destination');
      $user = User::find($id);
      if(isset($user['address'][0]) && $user['address'][0]){
        $address_1 = Address::where('matructhuoc', '=', $user['address'][0])->get();
      } else { $address_1 = ''; }
      if(isset($user['address'][1]) && $user['address'][1]){
        $address_2 = Address::where('matructhuoc', '=', $user['address'][1])->get();
      } else { $address_2 = ''; }
      return view('Admin.User.edit', ['user' => $user, 'address' => $address,'address_1' => $address_1,'address_2' => $address_2, 'roles' => self::$roles, 'destination' => $destination]);
    }

    function update(Request $request){
      $data = $request->all();
      $validator = Validator::make($request->all(), [
           'email' => 'required|unique:users,id'.$data['id'],
           'slug'  => 'required|unique:users,id'.$data['id'],
           'name'  => 'required',
           'phone' => 'required',
           'address.0' => 'required','address.1' => 'required','address.2' => 'required','address.3' => 'required',
           'roles' => 'required'
       ]);
       if ($validator->fails()) {
          return redirect(env('APP_URL').'admin/user/edit/'.$data['id'])->withErrors($validator)->withInput();
        }
        $user = User::find($data['id']);
        $user->id = $data['id'];
        $user->name = $data['name'];
        //$user->email = $data['email'];
        if(isset($data['password']) && $data['password']){
          $user->password = Hash::make($data['password']);  
        }
        $user->roles = isset($data['roles']) ? $data['roles'] : '';
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->active = isset($data['active']) ? intval($data['active']) : 0;
        $user->store = isset($data['store']) ? $data['store'] : '';
        $user->slug = isset($data['slug']) ? $data['slug'] : '';
        $user->website = isset($data['website']) ? $data['website'] : '';
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }
        $user->photos = $arr_photo;
        $user->gioi_thieu = isset($data['gioi_thieu']) ? $data['gioi_thieu'] : '';
        $user->save();
        if(isset($data['destination']) && $data['destination']){
          return redirect()->intended(env('APP_URL').$data['destination']);
        } else {
          return redirect()->intended(env('APP_URL').'admin/user');
        }
    }

    function checkExists($email){
      $u = User::where('email', '=', $email)->take(1)->get()->toArray();
      if($u){
        return true;
      } else {
        return false;
      }
    }
    function delete(Request $request, $id){
      $u = User::find($id)->toArray();
      $destination = $request->get('destination');
      if(isset($u['photos']) && $u['photos']){
        foreach($u['photos'] as $photo){
          ImageController::remove($photo['aliasname']);
        }
      }
      User::destroy($id);
      if($destination){
         return redirect()->intended($destination);
      } else {
        return redirect()->intended(env('APP_URL').'admin/user');
      }
    }

    function customer(){
      $users = User::where('roles', '=', 'Customer')->orderBy('updated_at', 'desc')->get()->toArray();
      return view('Admin.Customer.index', ['users' => $users]);
    }

  function customerUpdate(Request $request){
    $data = $request->all();
    $password = isset($data['password']) ? $data['password'] : '';
    $confirm_password = isset($data['confirm_password']) ? $data['confirm_password'] : '';
    if($password && $password === $confirm_password){
      $user = User::find($data['id']);
      $user->name = $data['name'];
      $user->phone = $data['phone'];
      $user->password = Hash::make($password);
      $user->save();$u = User::find($data['id']); $request->session()->put('customer', $u);
      echo 'Cập nhật thành công.';
    } else if(!$password){
      $user = User::find($data['id']);
      $user->name = $data['name'];
      $user->phone = $data['phone'];
      $user->save();$u = User::find($data['id']); $request->session()->put('customer', $u);
      echo 'Cập nhật thành công.';
    } else {
      echo 'Mật khẩu không trùng khớp';
    }
  }
  function change_password(Request $request){
    return view('Admin.User.change_password');
  }

  function update_password(Request $request){
    $data = $request->all();
    if (!Auth::attempt(['email' => $data['email'], 'password' => $data['old_password']])) {
      return redirect(env('APP_URL').'admin/user/change-password')->withErrors(['msg' => 'Mật khẩu cũ không trùng khớp'])->withInput();
    } else {
      if($data['password'] !== $data['confirm_password']){
        return redirect(env('APP_URL').'admin/user/change-password')->withErrors(['msg' => 'Mật khẩu mới không trùng khớp'])->withInput();
      } else {
        $user = User::find($data['id']);
        $user->password = Hash::make($data['password']);
        $user->save();
        return redirect(env('APP_URL').'admin/user/change-password')->withErrors(['msg' => 'Thay đổi mật khẩu thành công'])->withInput();
      }
    }
}
}
