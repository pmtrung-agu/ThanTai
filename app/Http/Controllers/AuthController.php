<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObjectController;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Hash;
use Session;
class AuthController extends Controller
{
    //
    function getLogin(Request $request){
      $destination = $request->get('destination');
      if(Auth::check()) {
        return redirect()->intended('admin');
      } else {
        return view('Admin.login', ['destination' => $destination]);
      }
    }

    static function checkPermis($arr){
      $roles = UserController::getRoles();
      if($arr){
        foreach($arr as $key => $value){
          if(in_array($value, $roles)){
            return true;
          }
        }
      }
      return false;
    }

    static function isRole($role){
      $roles = Session::get('user.roles');
      if(in_array($role, $roles)){
        return true;
      }
      return false;
    }

    function authenticate(Request $request){
      $data = $request->all();$log = new Log();
      $destination = $data['destination'];
      
      if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'active' => 1])) {
        $user = User::where('email', '=', $data['email'])->take(1)->get()->toArray();
        $request->session()->put('user', $user[0]);
        $log->action = 'Đăng nhập hệ thống';
        $log->id_user = ObjectController::ObjectId($user[0]['_id']);
        $log->email = $data['email'];
        $log->name = $user[0]['name'];
        $log->id_collection = ObjectController::ObjectId($user[0]['_id']);
        $log->collection = 'users';
        $log->data = $user[0];
        $log->save();
        if($destination){
          return redirect()->intended($destination);
        } else {
          return redirect()->intended(env('APP_URL').'admin');
        }
      } else {
        return redirect()->intended(env('APP_URL').'auth/login');
      }
    }

    function logout(Request $request){
      $id_user = $request->session()->get('user._id');
      $user = User::find($id_user);
      $log = new Log();
      $log->action = 'Đăng xuất hệ thống';
      $log->id_user = ObjectController::ObjectId($user['_id']);
      $log->email = $user['email'];
      $log->name = $user['name'];
      $log->id_collection = ObjectController::ObjectId($user['_id']);
      $log->collection = 'users';
      $log->data = $user;
      $log->save();
      Auth::logout();Session::flush();
      return redirect()->intended(env('APP_URL').'auth/login');
    }

    static function checkAuth(){
      if(Auth::check()) return true;
      else return false;
    }
    
    function admin(Request $request){
      if(Auth::check()) {
        return view('Admin.index');
      } else {
        return redirect()->intended(env('APP_URL').'auth/login?destination='.env('APP_HOST').$_SERVER['REQUEST_URI']);
      }
    }
    function notPermis(){
      return view('Admin.page_not_permis');
    }
}
