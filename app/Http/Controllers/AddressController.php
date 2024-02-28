<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
class AddressController extends Controller
{
    function list($id = null){
      if($id){
        $addresses = Address::where('matructhuoc', '=', $id)->get();
        if(strlen($id) == 2){
          //huyện
          $district = '';
          $province = Address::where('ma', '=', $id)->get();
        } else if (strlen($id) == 3){
          //huyện
          $district = Address::where('ma', '=', $id)->take(1)->get();
          $province = Address::where('ma', '=', $district[0]['matructhuoc'])->take(1)->get();
        } else { $province = '';$district='';}
      } else {
        $addresses = Address::where('matructhuoc', '=', '')->get();
        $province = '';$district='';
      }
      return view('Admin.Address.list', ['addresses' => $addresses, 'province' => $province, 'district' => $district ]);
    }

    function getOptions(Request $request, $id){
      $address = Address::where('matructhuoc', '=', $id)->get()->toArray();
      if($address){
        foreach($address as $a){
          echo '<option value="'.$a['ma'].'">'.$a['ten'].'</option>';
        }
      }
    }

    function getOptions1(Request $request, $id, $id1){
      $address = Address::where('matructhuoc', '=', $id)->get()->toArray();
      if($address){
        foreach($address as $a){
          echo '<option value="'.$a['ma'].'"'.($a['ma'] == $id1 ? ' selected' : '').'>'.$a['ten'].'</option>';
        }
      }
    }

    static function getDiaChi($arr){
      $str_array = array();
      if($arr){
        foreach($arr as $key => $value){
          if($key <= 2){
            if($value){
              $dc = Address::where('ma',$value,'=')->take(1)->get()->toArray();
              array_unshift($str_array, $dc[0]['ten']);
              //array_push($str_array, $dc[0]['ten']);
            }
          } else {
            if($value){
              array_unshift($str_array, $value);
            }
            //array_push($str_array, $value);
            //$str_array[] = $value;
          }
        }
      }
      return implode(", ", $str_array);
    }

}
