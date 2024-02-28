<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use Validator;
use Storage;
class ArticleController extends Controller
{
    //
    function index(){
        $list = Article::orderBy('updated_at','desc')->get()->toArray();
        return view('Admin.Article.list')->with(compact('list'));
    }

    function download(Request $request, $id = null, $key = 0){
        $art = Article::find($id)->toArray();
        $filename = str_slug($art['dinhkem'][$key]['title']) . '.' . $art['dinhkem'][$key]['type'];
        return Storage::download(env('APP_URL').'public/files/'.$art['dinhkem'][$key]['aliasname'], $filename);
    }

    function add(){
        $categories = Category::All()->toArray();
        return view('Admin.Article.add')->with(compact('categories'));
    }

    function create(Request $request){
        $validator = Validator::make($request->all(), [
        'slug' => 'required|unique:articles'
        ]);
        if ($validator->fails()) {
          return redirect('admin/article/add')->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $arr_attachments = array();
        if(isset($data['file_aliasname'])){
            foreach($data['file_aliasname'] as $k => $v){
              array_push($arr_attachments, array('aliasname' => $v, 'filename' => $data['file_filename'][$k], 'title' =>  $data['file_title'][$k], 'size' => $data['file_size'][$k], 'type' => $data['file_type'][$k]));
            }
        }
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }
        $db = new Article();
        $db->title = $data['title'];
        $db->slug = $data['slug'];
        $db->description = $data['description'];
        $db->contents = $data['contents'];
        $db->id_category = $data['id_category'];
        $db->order = intval($data['order']);
        $db->icon = $data['icon'];
        $db->photos = $arr_photo;
        $db->dinhkem = $arr_attachments;
        $db->save();
        return redirect()->intended('admin/article');
    }

    function edit(Request $request, $id = null){
        $cat = Article::find($id);
        $categories = Category::All()->toArray();
        return view('Admin.Article.edit')->with(compact('cat','categories'));
    }

    function update(Request $request){
        $data = $request->all();
        $validator = Validator::make($request->all(), [
        'slug' => 'required|unique:articles,id'.$data['id']
        ]);
        if ($validator->fails()) {
          return redirect('admin/article/edit')->withErrors($validator)->withInput();
        }
        $arr_attachments = array();
        if(isset($data['file_aliasname'])){
            foreach($data['file_aliasname'] as $k => $v){
              array_push($arr_attachments, array('aliasname' => $v, 'filename' => $data['file_filename'][$k], 'title' =>  $data['file_title'][$k], 'size' => $data['file_size'][$k], 'type' => $data['file_type'][$k]));
            }
        }
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }
        $db = Article::find($data['id']);
        $db->title = $data['title'];
        $db->slug = $data['slug'];
        $db->description = isset($data['description']) ? $data['description'] : '';
        $db->contents = isset($data['contents']) ? $data['contents'] : '';
        $db->id_category = isset($data['id_category']) ? $data['id_category'] : '';
        $db->order = intval($data['order']);
        $db->icon = $data['icon'];
        $db->photos = $arr_photo;
        $db->dinhkem = $arr_attachments;
        $db->save();
        return redirect()->intended('admin/article');
    }

    function delete(Request $request, $id = null){
        $cat = Article::find($id);
        if($cat['dinhkem']){
            foreach($cat['dinhkem'] as $dk){
                FileController::remove($dk['aliasname']);
            }
        }
        Article::destroy($id);
        return redirect()->intended('admin/article');
    }
}
