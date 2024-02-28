<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailList;
class MailListController extends Controller
{
    //

    function register(Request $request){
    	$data = $request->all();
    	$e = MailList::where('email','=',$data['email'])->first();
    	if($e){
    		echo 'Địa chỉ email đã đăng ký rồi';
    	} else {
    		$db = new MailList();
	    	$db->email = $data['email'];
	    	$db->save();	
	    	echo 'Đăng ký thành công';
    	}
    }

    function mail_list(){
    	$emails = MailList::orderBy('created_at','desc')->get()->toArray();
    	return view('Admin.Report.mail_list')->with(compact('emails'));
    }

    function delete(Request $request, $id = ''){
    	MailList::destroy($id);

    	return redirect(env('APP_URL').'admin/mail-list');
    }
}
