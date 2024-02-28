<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\ImageController;
use Image;
use Validator;
use Redirect;
class ProductCategoryController extends Controller
{
    //
    function list($id_parent = null, $level = 0){
    	if($level == 1){
        $lv1 = ProductCategory::where('_id', '=', $id_parent)->take(1)->get()->toArray();
        $lv2 = '';
      } else if($level == 2){
        $lv2 = ProductCategory::where('_id', '=', $id_parent)->take(1)->get()->toArray();
        $lv1 = ProductCategory::where('_id', '=', $lv2[0]['id_parent'])->take(1)->get()->toArray();
      } else {
        $lv1 = '';$lv2 = '';
      }

      if($id_parent){
        $list = ProductCategory::where('id_parent', '=', $id_parent)->orderBy('order','asc')->get();
      } else {
        $list = ProductCategory::where('id_parent', '=', '')->orderBy('order','asc')->get();
      }
      return view('Admin.ProductCategory.list', ['list' => $list, 'id_parent' => $id_parent, 'level' => $level, 'lv1' => $lv1, 'lv2' => $lv2 ]);
    }

    function add($id_parent = null, $level = 0){
      $list = ProductCategory::where('id_parent', '=', '')->get()->toArray();
      if($list){
        foreach($list as $key => $value){
          //Child 1
          $lv1 = ProductCategory::where('id_parent', '=', $value['_id'])->get()->toArray();
          $list[$key]['lv1'] = $lv1;
        }
      }
      return view('Admin.ProductCategory.add', [ 'list' => $list, 'id_parent' => $id_parent, 'level' => $level ]);
    }

    function create(Request $request){
      $validator = Validator::make($request->all(), [
        'slug' => 'required|unique:product_categories'
      ]);
      if ($validator->fails()) {
        return redirect('admin/product-category/add')->withErrors($validator)->withInput();
      }
      $data = $request->all();
      $arr_photo = array();
      if(isset($data['hinhanh_aliasname'])){
        foreach($data['hinhanh_aliasname'] as $key => $value){
          array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'filename' => $data['hinhanh_title'][$key]));
        }
      }
      $db = new ProductCategory();
      $db->title = $data['title'];
      $db->slug = $data['slug'];
      $db->id_parent = $data['id_parent'] ? ObjectController::ObjectId($data['id_parent']) : '';
      $db->order = intval($data['order']);
      $db->icon = $data['icon'];
      $db->photos = $arr_photo;
      $db->status = isset($data['status']) ? intval($data['status']) : 0;
      $db->save();
      return redirect()->intended('admin/product-category');
    }

     function edit(Request $request, $id = null, $id_parent = null, $level=0){
      $cat = ProductCategory::find($id);
      $list = ProductCategory::where('id_parent', '=', '')->get()->toArray();
      if($list){
        foreach($list as $key => $value){
          //Child 1
          $lv1 = ProductCategory::where('id_parent', '=', $value['_id'])->get()->toArray();
          $list[$key]['lv1'] = $lv1;
        }
      }
      return view('Admin.ProductCategory.edit', ['cat' => $cat, 'list' => $list, 'id_parent' => $id_parent, 'level' =>$level ]);
    }

    function update(Request $request){
      $data = $request->all();
        $validator = Validator::make($request->all(), [
        'slug' => 'required|unique:product_categories,id'.$data['id']
        ]);
        if ($validator->fails()) {
          return redirect('admin/product-category/edit')->withErrors($validator)->withInput();
        }
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'filename' => $data['hinhanh_title'][$key]));
          }
        }
        $db = ProductCategory::find($data['id']);
        $db->title = $data['title'];
        $db->slug = $data['slug'];
        $db->id_parent = $data['id_parent'] ? ObjectController::ObjectId($data['id_parent']) : '';
        $db->order = intval($data['order']);
        $db->icon = $data['icon'];
        $db->photos = $arr_photo;
        $db->status = isset($data['status']) ? intval($data['status']) : 0;
        $db->save();
        return redirect()->intended('admin/product-category');
    }

    function delete($id=null, $id_parent=null, $level=0){
      $cats = ProductCategory::find($id)->toArray();
      if($cats['photos']){
        foreach($cats['photos'] as $photo){
          ImageController::remove($photo['aliasname']);
        }
      }
      ProductCategory::destroy($id);
      if($id_parent && $level)
        return redirect('admin/product-category/'.$id_parent.'/'.$level);
      else
      return redirect('admin/product-category');
    }
}
