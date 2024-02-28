<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ObjectController extends Controller
{
    //
    function getSlug(Request $request, $str = ''){
      //$str = $request->input('str');
      return  Str::slug($str, '-');
    }

    static function Slug($str){
      return Str::slug($str, '-');
    }

    static function ObjectId($id = null){
      return new \MongoDB\BSON\ObjectId($id);
    }
    static function Id(){
      return new \MongoDB\BSON\ObjectId();
    }

    function getAttributes(){
      return view('Admin.Get.attributes');
    }

    public static function cut_string($str, $number){
    	$str_cut = '';
    	$a = explode(' ', $str);
    	if(count($a) >= $number){
    		for($i=0; $i < $number; $i++){
    			$str_cut .= ' ' . $a[$i];
    		}
    		return $str_cut;
    	} else {
    		return $str;
    	}
    }

    public static function vn_to_str($str){
      $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd'=>'đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i'=>'í|ì|ỉ|ĩ|ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D'=>'Đ',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        'va' => '&'
      );
      foreach($unicode as $nonUnicode=>$uni){
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
      }
      $str = str_replace(' ','-',$str);
      $str = str_replace('!','',$str);
      $str = str_replace('.','',$str);
      $str = str_replace(',','-',$str);
      $str = str_replace('/','-',$str);
      $str = str_replace(':','-',$str);
      $str = str_replace('&', 'va', $str);
      $str = str_replace('?','-',$str);
      $str = str_replace("'",'',$str);
      $str = strtolower($str);
      return $str;
    }

    public static function convertStr2Number($string){
      $len_of_string = strlen($string);
    	$i = 0;
    	$number = '';
    	for($i=0; $i<$len_of_string; $i++){
    		if($string[$i] != ",") $number .= $string[$i];
    	}
    	//$number = str_replace(",","",$number);
    	return doubleval($number);
    }

    public static function convertStr2Number_1($string){
      $len_of_string = strlen($string);
      $i = 0;
      $number = '';
      for($i=0; $i<$len_of_string; $i++){
        if($string[$i] != ".") $number .= $string[$i];
      }
      //$number = str_replace(",","",$number);
      return doubleval($number);
    }

    public static function setDate(){
        $tz = new \DateTimeZone('Asia/Ho_Chi_minh'); //Change your timezone
        $date = date("Y-m-d h:i:sa");
        $a = new \MongoDB\BSON\UTCDateTime(strtotime($date)*1000);
        return $a;
    }

    public static function setConvertDate($date){
      $tz = new \DateTimeZone('Asia/Ho_Chi_minh'); //Change your timezone
      $date = new \MongoDB\BSON\UTCDateTime(strtotime($date)*1000);
      return $date;
    }

    public static function getDate($date, $format){
        $tz = new \DateTimeZone('Asia/Ho_Chi_minh'); //Change your timezone
        //$date = date("Y-m-d h:i:sa");
        $a = new \MongoDB\BSON\UTCDateTime(strval($date));
        $datetime = $a->toDateTime();
        $datetime->setTimezone($tz);
        $time=$datetime->format($format);
        return $time;
    }

    public static function convertDateTime($str){
      $str_date = '';
      $a = explode(" ", $str);
      $b = explode("/", $a[0]);
      $str_date = $b[2].'-'.$b[1].'-'.$b[0].' '.$a[1].':00';
      $tz = new \DateTimeZone('Asia/Ho_Chi_minh'); //Change your timezone
      $date = new \MongoDB\BSON\UTCDateTime(strtotime($str_date)*1000);
      return $date;
    }

    public static function convertDate($str){
      $str_date = '';
      $b = explode("/", $str);
      $str_date = $b[2].'-'.$b[1].'-'.$b[0].' 00:00';
      $tz = new \DateTimeZone('Asia/Ho_Chi_minh'); //Change your timezone
      $date = new \MongoDB\BSON\UTCDateTime(strtotime($str_date)*1000);
      return $date;
    }

    public static function str_cat($number, $lenght){
      $str = '';
      $l = strlen($number);
      if($l < 6) {
        for($i=$l; $i<6;$i++){
          $str .= '0';
        }
      }
      return $str . $number;
    }
}
