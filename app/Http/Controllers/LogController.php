<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Log;
class LogController extends Controller
{
    //
    function index(){
    	return view('Admin.Report.logs');
    }

    function datatable(Request $request){
    	$start = $request->input('start') != null ? $request->input('start') : 0;
     	$length = $request->input('length') != null ? $request->input('length') : 20;
     	$draw = $request->input('draw') != null ? $request->input('draw') : 1;
     	$keysearch = $request->input('search.value') != null ? $request->input('search.value') : '';
     	$arr_logs = array();
     	$recordsTotal = Log::count();
    	if(!empty($keysearch)){
    		$recordsFiltered = Log::where('action', 'regexp', '/.*'.$keysearch.'/i')->count();
    		$logs = Log::where('action', 'regexp', '/.*'.$keysearch.'/i')->orderBy('updated_at', 'desc')->skip(intval($start))->take(intval($length))->get();
     	} else {
       		$recordsFiltered = Log::count();
       		$logs = Log::orderBy('updated_at', 'desc')->skip(intval($start))->take(intval($length))->get();
     	}
     if($logs){
       foreach($logs as $log){
         array_push($arr_logs, array($log['_id'], $log['created_at']->format("d/m/Y H:i"), $log['action'], $log['email']));
       }
     }
     echo json_encode(
      array('draw' => $draw,
        'recordsTotal' => $recordsTotal,
        'recordsFiltered' => $recordsFiltered,
        'data' => $arr_logs
      ));
    }
}
