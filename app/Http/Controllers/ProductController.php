<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\AuthController;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductCategory;
use Validator;
use Session;
class ProductController extends Controller
{
    //
    function list(Request $request, $status = '') {
    	if(AuthController::isRole('Admin') || AuthController::isRole('Manager')){
            if($status == ''){
                $products = Product::orderBy('updated_at', 'desc')->paginate(20);
            } else if($status == 1){
                $products = Product::where('status','=',1)->orderBy('updated_at', 'desc')->paginate(20);
            } else {
                $products = Product::where('status','=',0)->orderBy('updated_at', 'desc')->paginate(20);
            }
        } else {
            $id_seller = ObjectController::ObjectId(Session::get('user._id'));
            if($status == ''){
                $products = Product::where('id_seller','=',$id_seller)->orderBy('updated_at', 'desc')->paginate(20);
            } else if($status == 1){
                $products = Product::where('id_seller','=',$id_seller)->where('status','=',1)->orderBy('updated_at', 'desc')->paginate(20);
            } else {
                $products = Product::where('id_seller','=',$id_seller)->where('status','=',0)->orderBy('updated_at', 'desc')->paginate(20);
            }
        }
    	return view('Admin.Product.list')->with(compact('products'));
    }

    function add(){
        $product_categories = ProductCategory::All()->toArray();
        $id_user = ObjectController::ObjectId(Session::get('user._id'));
        if(AuthController::isRole('Admin')){
            $sellers = User::where('roles', 'Seller')->get()->toArray();
        } else {
            $sellers = User::where('_id', '=', $id_user)->orderBy('created_at','desc')->take(1)->get()->toArray();
        }
    	return view('Admin.Product.add')->with(compact('product_categories', 'sellers', 'id_user'));
    }

    function create(Request $request){
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:products',
            'slug' => 'required|unique:products'
        ]);
        if ($validator->fails()) {
          return redirect('admin/product/add')->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }
        $db = new Product();
        $db->code = $data['code'];
        $db->title = $data['title'];
        $db->author = isset($data['author']) ? $data['author'] : '';
        $db->slug = $data['slug'];
        $db->id_product_category = $data['id_product_category'];
        $db->description = $data['description'];
        $db->contents = $data['contents'];
        $db->prices = ObjectController::convertStr2Number_1($data['prices']);
        $db->status = isset($data['status']) ? intval($data['status']) : 0;
        $db->hot = isset($data['hot']) ? intval($data['hot']) : 0;
        $db->id_seller = ObjectController::ObjectId($data['id_seller']);
        $db->id_user = ObjectController::ObjectId($request->session()->get('user._id'));
        $db->photos = $arr_photo;
        $db->save();
        return redirect()->intended('admin/product');
    }

    public function edit(Request $request, $id = ''){
        $product = Product::find($id);
        $product_categories = ProductCategory::All()->toArray();
        if(AuthController::isRole('Admin')){
            $sellers = User::where('roles','=', 'Seller')->get()->toArray();
        } else {
            $id_user = ObjectController::ObjectId(Session::get('user._id'));
            $sellers = User::where('_id', '=', $id_user)->take(1)->get()->toArray();
        }
        if($product_categories){
            foreach($product_categories as $key => $value){
              $child_1 = ProductCategory::where('id_parent', '=', $value['_id'])->get()->toArray();
              $product_categories[$key]['level_1'] = $child_1;
              if($child_1) {
                foreach ($child_1 as $key_1 => $value_1) {
                  $child_2 = ProductCategory::where('id_parent', '=', $value_1['_id'])->get()->toArray();
                  $product_categories[$key]['level_1'][$key_1]['level_2'] = $child_2;
                }
              }
            }
          }
        return view('Admin.Product.edit')->with(compact('product','product_categories', 'sellers'));
    }

    function update(Request $request){
        $data = $request->all();
        $validator = Validator::make($request->all(), [
        'code' => 'required|unique:products,_id'.$data['id'],
        'slug' => 'required|unique:products,_id'.$data['id']
        ]);
        if ($validator->fails()) {
          return redirect('admin/product/edit')->withErrors($validator)->withInput();
        }
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }
        $db = Product::find($data['id']);
        $db->code = $data['code'];
        $db->title = $data['title'];
        $db->slug = $data['slug'];
        $db->id_product_category = $data['id_product_category'];
        $db->description = $data['description'];
        $db->contents = $data['contents'];
        $db->prices = ObjectController::convertStr2Number_1($data['prices']);
        $db->status = isset($data['status']) ? intval($data['status']) : 0;
        $db->hot = isset($data['hot']) ? intval($data['hot']) : 0;
        $db->id_seller = ObjectController::ObjectId($data['id_seller']);
        $db->id_user = ObjectController::ObjectId($request->session()->get('user._id'));
        $db->photos = $arr_photo;
        $db->save();
        return redirect()->intended('admin/product');
    }

    function update_status(Request $request, $id = ''){
        $product = Product::find($id);
        if($product['status'] == 1){ $status = 0; } else { $status = 1;}
        $product->status = intval($status);
        $product->save();
    }

    function delete(Request $request, $id=null){
      $product = Product::find($id)->toArray();
      if($product['photos']){
        foreach($product['photos'] as $photo){
          ImageController::remove($photo['aliasname']);
        }
      }
      Product::destroy($id);
      return redirect('admin/product');
    }
}
