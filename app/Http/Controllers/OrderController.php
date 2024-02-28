<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObjectController;
use App\Models\Order;
use App\Models\Log;
use App\Models\User;
use Session;
class OrderController extends Controller
{
    //
    public $arr_status = array(0 => 'Đang xử lý', 1 => 'Đã giao hàng', 2 => 'Hủy');
    function list(Request $request, $status = ''){
        if(AuthController::isRole('Admin')){
            $orders = Order::orderBy('created_at','desc')->get()->toArray();
        } else {
            $id_seller = $request->session()->get('user._id');
            $orders = Order::where('products.id_seller', '=', ObjectController::ObjectId($id_seller))->orderBy('created_at','desc')->get()->toArray();  
        }
    	return view('Admin.Order.list')->with(compact('orders'));
    }

    function list_status(Request $request, $status){
        if(AuthController::isRole('Admin')){
            $orders = Order::where('products.status', '=', intval($status))->orderBy('created_at','desc')->get()->toArray();
        } else {
            $id_seller = $request->session()->get('user._id');
            $orders = Order::where('products.status', '=', intval($status))->where('products.id_seller', '=', ObjectController::ObjectId($id_seller))->orderBy('created_at','desc')->get()->toArray();  
        }
        return view('Admin.Order.list')->with(compact('orders'));
    }
    function update_status(Request $request){
        $data = $request->all();
        $order = Order::find($data['id']);
        $arr_sanpham = $order['products'];
        
        $arr_status = $data['status'];
        $key_sanpham = $data['key_sanpham'];
        foreach($key_sanpham as $key){
            $arr_sanpham[$key]['status'] = intval($arr_status[$key]);
        }
        $order->products = $arr_sanpham;
        $order->save();
        return redirect()->intended(env('APP_URL').'admin/order/detail/'.$order['_id'])->with('msg','Cập nhật đơn hàng thành công!');
    }

    function detail(Request $request, $id = ''){
    	$order = Order::find($id);
        $arr_status = $this->arr_status;
    	return view('Admin.Order.detail')->with(compact('order', 'arr_status'));
    }

    function invoice(Request $request, $id = ''){
    	$order = Order::find($id);
    	return view('Admin.Order.invoice')->with(compact('order'));
    }

    function delete(Request $request, $id = ''){
        $data = Order::find($id);
        $id_user = $request->session()->get('user._id');
        $user = User::find($id_user);
        $log = new Log();
        $log->action = 'Xóa đơn hàng ['.$data['code'].']';
        $log->id_user = ObjectController::ObjectId($user['_id']);
        $log->email = $user['email'];
        $log->name = $user['name'];
        $log->id_collection = ObjectController::ObjectId($data['_id']);
        $log->collection = 'orders';
        $log->data = $data;
        $log->save();
        Order::destroy($id);
        Session::flash('msg', 'Xóa đơn hàng thành công');
        return redirect()->intended(env('APP_URL').'admin/order');
    }
}
