<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ObjectController;
use App\Models\Shopping;
use App\Models\Address;
use App\Models\Log;
use App\Http\Controllers\ImageController;
use Validator;
use Redirect;
use Image;
class ShoppingController extends Controller
{
    //
    function index(){
    	$shopping = Shopping::All()->toArray();
    	return view('Admin.Shopping.list')->with(compact('shopping'));
    }

    function add(){
    	$address = Address::where('matructhuoc', 'exists', false)->orWhere('matructhuoc', '=', '')->get();
    	return view('Admin.Shopping.add', [ 'address' => $address ]);
    }

    function create(Request $request){
    	$validator = Validator::make($request->all(), [
    		'title' => 'required',
	        'slug' => 'required|unique:shoppings',
	        'email' => 'required|unique:shoppings',
	        'phone' => 'required',
	        'address.0' => 'required','address.1' => 'required','address.2' => 'required','address.3' => 'required'
	    ]);
	    if ($validator->fails()) {
	        return redirect(env('APP_URL').'admin/shopping/add')->withErrors($validator)->withInput();
	    }
	    $data = $request->all();
	    $db = new Shopping();
	    $db->title = $data['title'];
	    $db->slug = $data['slug'];
	    $db->phone = $data['phone'];
      	$db->email = $data['email'];
      	$db->address = $data['address'];
      	$db->website = isset($data['website']) ? $data['website'] : '';
      	$arr_photo = array();
      	if(isset($data['hinhanh_aliasname'])){
	        foreach($data['hinhanh_aliasname'] as $key => $value){
	          array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
	        }
      	}
	    $db->photos = $arr_photo;
	    $db->gioi_thieu = isset($data['gioi_thieu']) ? $data['gioi_thieu'] : '';
	    $db->save();
	    return redirect()->intended(env('APP_URL').'admin/shopping');
    }

    function edit(Request $request, $id = ''){
    	$address = Address::where('matructhuoc', 'exists', false)->orWhere('matructhuoc', '=', '')->get();
      	$destination = $request->get('destination');
      	$shop = Shopping::find($id);
      	if(isset($shop['address'][0]) && $shop['address'][0]){
        	$address_1 = Address::where('matructhuoc', '=', $shop['address'][0])->get();
      	} else { $address_1 = ''; }
      	if(isset($shop['address'][1]) && $shop['address'][1]){
        	$address_2 = Address::where('matructhuoc', '=', $shop['address'][1])->get();
      	} else { $address_2 = ''; }
    	return view('Admin.Shopping.edit', ['shop' => $shop, 'address' => $address,'address_1' => $address_1,'address_2' => $address_2, 'destination' => $destination]);
    }

    function update(Request $request) {
    	$data = $request->all();
    	$validator = Validator::make($request->all(), [
    		'title' => 'required',
	        'slug' => 'required|unique:shoppings,'.$data['id'],
	        'email' => 'required|unique:shoppings,'.$data['id'],
	        'phone' => 'required',
	        'address.0' => 'required','address.1' => 'required','address.2' => 'required','address.3' => 'required'
	    ]);
	    if ($validator->fails()) {
	        return redirect(env('APP_URL').'admin/shopping/edit/'.$data['id'])->withErrors($validator)->withInput();
	    }
	    $db = Shopping::find($data['id']);
	    $db->title = $data['title'];
	    $db->slug = $data['slug'];
	    $db->phone = $data['phone'];
      	$db->email = $data['email'];
      	$db->address = $data['address'];
      	$db->website = isset($data['website']) ? $data['website'] : '';
      	$arr_photo = array();
      	if(isset($data['hinhanh_aliasname'])){
	        foreach($data['hinhanh_aliasname'] as $key => $value){
	          array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
	        }
      	}
	    $db->photos = $arr_photo;
	    $db->gioi_thieu = isset($data['gioi_thieu']) ? $data['gioi_thieu'] : '';
	    $db->save();
	    return redirect()->intended(env('APP_URL').'admin/shopping');
    }

    function delete(Request $request, $id){
      $u = Shopping::find($id)->toArray();
      $destination = $request->get('destination');
      if(isset($u['photos']) && $u['photos']){
        foreach($u['photos'] as $photo){
          ImageController::remove($photo['aliasname']);
        }
      }
      Shopping::destroy($id);
      if($destination){
         return redirect()->intended($destination);
      } else {
        return redirect()->intended(env('APP_URL').'admin/shopping');
      }
    }
}
