<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use Validator;
class CategoryController extends Controller
{
    //
    function index(){
        $list = Category::All()->toArray();
        return view('Admin.Category.index')->with(compact('list'));
    }

    function list(Request $request, $slug = null){
        $cat = Category::where('slug', '=', $slug)->take(1)->get()->toArray();
        if($cat){
            $list = Article::where('id_category', '=', $cat[0]['_id'])->orderBy('updated_at', 'desc')->get()->toArray();
        } else {
            $list = '';
        }
        return view('Admin.Category.list')->with(compact('list', 'cat'));
    }

    function add(){
        return view('Admin.Category.add');
    }

    function create(Request $request){
        $validator = Validator::make($request->all(), [
        'slug' => 'required|unique:categories'
        ]);
        if ($validator->fails()) {
          return redirect('admin/category/add')->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'filename' => $data['hinhanh_title'][$key]));
          }
        }
        $db = new Category();
        $db->title = $data['title'];
        $db->slug = $data['slug'];
        $db->order = intval($data['order']);
        $db->icon = $data['icon'];
        $db->photos = $arr_photo;
        $db->save();
        return redirect()->intended('admin/category');
    }

    function edit(Request $request, $id = null){
        $cat = Category::find($id);
        return view('Admin.Category.edit')->with(compact('cat'));
    }

    function update(Request $request){
        $data = $request->all();
        $validator = Validator::make($request->all(), [
        'slug' => 'required|unique:categories,id'.$data['id']
        ]);
        if ($validator->fails()) {
          return redirect('admin/category/edit')->withErrors($validator)->withInput();
        }
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'filename' => $data['hinhanh_title'][$key]));
          }
        }
        $db = Category::find($data['id']);
        $db->title = $data['title'];
        $db->slug = $data['slug'];
        $db->order = intval($data['order']);
        $db->icon = $data['icon'];
        $db->photos = $arr_photo;
        $db->save();
        return redirect()->intended('admin/category');
    }

    function delete(Request $request, $id = null){
        $cat = Category::find($id);
        if($cat['photos']){
            foreach($cat['photos'] as $photo){
                ImageController::remove($photo['aliasname']);
            }
        }
        Category::destroy($id);
        return redirect()->intended('admin/category');
    }
}
