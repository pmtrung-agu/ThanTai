<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FileController;
use App\Models\MarketPrice;
use Validator;

class MarketPriceController extends Controller
{
    //

    function index(){
    	$list = MarketPrice::All()->toArray();
    	return view('Admin.MarketPrice.list')->with(compact('list'));
    }

    function add(){
    	return view('Admin.MarketPrice.add');
    }

    function create(Request $request){
    	$validator = Validator::make($request->all(), [
            'title' => 'required:market_price',
            'file_aliasname' => 'required'
        ]);
        if ($validator->fails()) {
          return redirect('admin/market-price/add')->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $arr_attachments = array();
        if(isset($data['file_aliasname'])){
            foreach($data['file_aliasname'] as $k => $v){
              array_push($arr_attachments, array('aliasname' => $v, 'filename' => $data['file_filename'][$k], 'title' =>  $data['file_title'][$k], 'size' => $data['file_size'][$k], 'type' => $data['file_type'][$k]));
            }
        }
        $db = new MarketPrice;
        $db->title = $data['title'];
        $db->tungay = $data['tungay'];
        $db->denngay = $data['denngay'];
        $db->dinhkem = $arr_attachments;
        $db->save();
        return redirect()->intended('admin/market-price');
    }

    function update(Request $request){
    	$validator = Validator::make($request->all(), [
            'title' => 'required:market_price',
            'file_aliasname' => 'required'
        ]);
        if ($validator->fails()) {
          return redirect('admin/market-price/add')->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $arr_attachments = array();
        if(isset($data['file_aliasname'])){
            foreach($data['file_aliasname'] as $k => $v){
              array_push($arr_attachments, array('aliasname' => $v, 'filename' => $data['file_filename'][$k], 'title' =>  $data['file_title'][$k], 'size' => $data['file_size'][$k], 'type' => $data['file_type'][$k]));
            }
        }
        $db = MarketPrice::find($data['id']);
        $db->title = $data['title'];
        $db->tungay = $data['tungay'];
        $db->denngay = $data['denngay'];
        $db->dinhkem = $arr_attachments;
        $db->save();
        return redirect()->intended('admin/market-price');
    }

    function edit(Request $request, $id = ''){
    	$mp = MarketPrice::find($id);
    	return view('Admin.MarketPrice.edit')->with(compact('mp'));
    }

    function delete(Request $request, $id = null){
        $cat = MarketPrice::find($id);
        if($cat['dinhkem']){
            foreach($cat['dinhkem'] as $dk){
                FileController::remove($dk['aliasname']);
            }
        }
        MarketPrice::destroy($id);
        return redirect()->intended('admin/market-price');
    }
}
