<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FileController;
use App\Models\Logistic;
use Validator;
class LogisticController extends Controller
{
    //
    function index(){
    	$list = Logistic::All()->toArray();
    	return view('Admin.Logistic.list')->with(compact('list'));
    }

    function add(){
    	return view('Admin.Logistic.add');
    }

    function create(Request $request){
    	$validator = Validator::make($request->all(), [
            'title' => 'required:logistics',
            'file_aliasname' => 'required'
        ]);
        if ($validator->fails()) {
          return redirect('admin/logistic/add')->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $arr_attachments = array();
        if(isset($data['file_aliasname'])){
            foreach($data['file_aliasname'] as $k => $v){
              array_push($arr_attachments, array('aliasname' => $v, 'filename' => $data['file_filename'][$k], 'title' =>  $data['file_title'][$k], 'size' => $data['file_size'][$k], 'type' => $data['file_type'][$k]));
            }
        }
        $db = new Logistic;
        $db->title = $data['title'];
        $db->dinhkem = $arr_attachments;
        $db->save();
        return redirect()->intended('admin/logistic');
    }

    function update(Request $request){
    	$validator = Validator::make($request->all(), [
            'title' => 'required:market_price',
            'file_aliasname' => 'required'
        ]);
        if ($validator->fails()) {
          return redirect('admin/logistic/add')->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $arr_attachments = array();
        if(isset($data['file_aliasname'])){
            foreach($data['file_aliasname'] as $k => $v){
              array_push($arr_attachments, array('aliasname' => $v, 'filename' => $data['file_filename'][$k], 'title' =>  $data['file_title'][$k], 'size' => $data['file_size'][$k], 'type' => $data['file_type'][$k]));
            }
        }
        $db = Logistic::find($data['id']);
        $db->title = $data['title'];
        $db->dinhkem = $arr_attachments;
        $db->save();
        return redirect()->intended('admin/logistic');
    }

    function edit(Request $request, $id = ''){
    	$mp = Logistic::find($id);
    	return view('Admin.Logistic.edit')->with(compact('mp'));
    }

    function delete(Request $request, $id = null){
        $cat = Logistic::find($id);
        if($cat['dinhkem']){
            foreach($cat['dinhkem'] as $dk){
                FileController::remove($dk['aliasname']);
            }
        }
        Logistic::destroy($id);
        return redirect()->intended('admin/logistic');
    }
}
