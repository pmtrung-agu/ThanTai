<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Address;
use App\Models\Farm;
use App\Models\Factory;
use App\Models\Shopping;
use App\Models\Log;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthController;
use Image;
use Validator;
use Redirect;
use Session;
class SellerController extends Controller
{
    //
    function list(Request $request, $status = ''){
        if($status == ''){
            $sellers = User::where('roles','Seller')->orderBy('updated_at', 'desc')->get()->toArray();
        } else if($status == 1) {
            $sellers = User::where('roles','Seller')->where('active','=',1)->orderBy('updated_at', 'desc')->get()->toArray();
        } else {
            $sellers = User::where('roles','Seller')->where('active','=',0)->orderBy('updated_at', 'desc')->get()->toArray();
        }

        return view('Admin.Seller.list')->with(compact('sellers'));
    }

    function update_status(Request $request, $id = ''){
        $user = User::find($id);
        if($user['active'] == 1){
            $user->active = 0;
        } else {
            $user->active = 1;
        }
        $user->save();
    }

    function add(){
        $address = Address::where('matructhuoc', 'exists', false)->orWhere('matructhuoc', '=', '')->get();
        return view('Admin.Seller.add')->with(compact('address'));
    }

    function create(Request $request){
      $validator = Validator::make($request->all(), [
        'email' => 'required|unique:users',
        'slug' => 'required|unique:users',
        'name' => 'required',
        'phone' => 'required',
        'password' => 'required',
        'store' => 'required',
      ]);
      if ($validator->fails()) {
        return redirect(env('APP_URL').'dang-nhap')->withErrors($validator)->withInput();
      }
      $data = $request->all();
      $user = new User();
      $user->name = $data['name'];
      $user->email = $data['email'];
      $user->password = Hash::make($data['password']);
      $user->roles = array('Seller');
      $user->phone = $data['phone'];
      $user->address = isset($data['address']) ? $data['address'] : array('','','','');
      $user->active = isset($data['active']) ? intval($data['active']) : 0;
      $user->store = $data['store'];
      $user->website = $data['website'];
      $user->slug = $data['slug'];
      $arr_photo = array();
      if(isset($data['hinhanh_aliasname'])){
        foreach($data['hinhanh_aliasname'] as $key => $value){
          array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
        }
      }
      $user->photos = $arr_photo;
      $user->save();
      return redirect()->intended(env('APP_URL') . 'admin/seller');
    }

    function edit(Request $reuqest, $id = ''){
        $address = Address::where('matructhuoc', 'exists', false)->orWhere('matructhuoc', '=', '')->get();
        $user = User::find($id);
        if(isset($user['address'][0]) && $user['address'][0]){
            $address_1 = Address::where('matructhuoc', '=', $user['address'][0])->get();
        } else { $address_1 = ''; }
        if(isset($user['address'][1]) && $user['address'][1]){
            $address_2 = Address::where('matructhuoc', '=', $user['address'][1])->get();
        } else { $address_2 = ''; }
        return view('Admin.Seller.edit', ['user' => $user, 'address' => $address,'address_1' => $address_1,'address_2' => $address_2]);
    }

    function update(Request $request){
        $data = $request->all();
        $validator = Validator::make($request->all(), [
           'email' => 'required|unique:users,_id'.$data['id'],
            'slug' => 'required|unique:users,_id'.$data['id'],
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'store' => 'required',
       ]);
        if ($validator->fails()) {
          return redirect(env('APP_URL').'admin/seller/edit/'.$data['id'])->withErrors($validator)->withInput();
        }
        $user = User::find($data['id']);
        $user->id = $data['id'];
        $user->name = $data['name'];
        //$user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->roles = array('Seller');
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->active = isset($data['active']) ? intval($data['active']) : 0;
        $user->store = $data['store'];
        $user->website = $data['website'];
        $user->slug = $data['slug'];
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }
        $user->photos = $arr_photo;
        $user->save();
        return redirect()->intended(env('APP_URL').'admin/seller');
    }

    function delete(Request $request, $id = ''){
        //check products, orders,
        $u = User::find($id)->toArray();
        if(isset($u['photos']) && $u['photos']){
            foreach($u['photos'] as $photo){
                ImageController::remove($photo['aliasname']);
            }
        }
        User::destroy($id);
        return redirect()->intended(env('APP_URL').'admin/seller');
    }
}
