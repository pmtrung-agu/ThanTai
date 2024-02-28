<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ObjectController;
use App\Models\Promotion;
use App\Models\Product;
class PromotionController extends Controller
{
    //
    function index(){
    	$promotions = Promotion::orderBy('updated_at', 'desc')->paginate(20);
    	return view('Admin.Promotion.list')->with(compact('promotions'));
    }

    function add(Request $request){
    	$id_user = $request->session()->get('user._id');
    	$id_user = ObjectController::ObjectId($id_user);
        $roles = $request->session()->get('user.roles');
        if(in_array('Admin', $roles)){
            $products = Product::where('status','=',1)->where('prices', '>', 0)->orderBy('created_at', 'desc')->get();
        } else {
            $products = Product::where('status','=',1)->where('prices', '>', 0)->where('id_seller', '=', $id_user)->orWhere('id_user','=', $id_user)->orderBy('created_at', 'desc')->get();    
        }
    	//$products = Product::orderBy('updated_at', 'desc')->paginate(30);
    	return view('Admin.Promotion.add')->with(compact('products'));
    }

    function create(Request $request){
    	$data = $request->all();
    	$date_from = $data['date_from'];
    	$date_to = $data['date_to'];
    	if($date_from >= $date_to){
    		return redirect(env('APP_URL') . 'admin/promotion/add')->withErrors(['message1'=>'Chọn ngày không đúng.'])->withInput();
    	}
    	$id_user = $request->session()->get('user_id');
    	$db = new Promotion();
    	$db->id_products = $data['id_products'];
    	$db->date_from = ObjectController::setConvertDate($data['date_from']);
    	$db->date_to = ObjectController::setConvertDate($data['date_to']);
    	$db->discount = $data['discount'];
    	$db->amount = ObjectController::convertStr2Number_1($data['amount']);
    	$db->id_user = ObjectController::ObjectId($id_user);
    	$db->save();
    	return redirect(env('APP_URL').'admin/promotion');
    }

    function edit(Request $request, $id = ''){
    	$ds = Promotion::find($id);
    	$id_user = $request->session()->get('user._id');
    	$id_user = ObjectController::ObjectId($id_user);
    	$roles = $request->session()->get('user.roles');
        if(in_array('Admin', $roles)){
            $products = Product::orderBy('created_at', 'desc')->get();
        } else {
            $products = Product::where('id_seller', '=', $id_user)->orWhere('id_user','=', $id_user)->orderBy('created_at', 'desc')->get();    
        }
    	return view('Admin.Promotion.edit')->with(compact('ds', 'products'));
    }

    function update(Request $request){
    	$data = $request->all();
    	$date_from = $data['date_from'];
    	$date_to = $data['date_to'];
    	if($date_from >= $date_to){
    		return redirect(env('APP_URL') . 'admin/promotion/edit/'.$data['id'])->withErrors(['message1'=>'Chọn ngày không đúng.'])->withInput();
    	}
    	$id_user = $request->session()->get('user_id');
    	$db = Promotion::find($data['id']);
    	$db->id_products = $data['id_products'];
    	$db->date_from = ObjectController::setConvertDate($data['date_from']);
    	$db->date_to = ObjectController::setConvertDate($data['date_to']);
    	$db->discount = $data['discount'];
    	$db->amount = ObjectController::convertStr2Number_1($data['amount']);
    	$db->id_user = ObjectController::ObjectId($id_user);
    	$db->save();
    	return redirect(env('APP_URL').'admin/promotion');
    }

    function delete(Request $request, $id = ''){
        Promotion::destroy($id);
        return redirect(env('APP_URL').'admin/promotion');
    }
}
