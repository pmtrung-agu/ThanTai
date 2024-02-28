<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Http\Controllers\ObjectController;
use Carbon\Carbon;
use Session;
class VisitController extends Controller
{
    //
    static function tracker(){
        $id = ObjectController::Id();
        $arr = [
            '_id' => $id,
            'day' => intval(date('d')),
            'month' => intval(date('m')),
            'week' => intval(date('W')),
            'year' => intval(date('Y')),
            'date_text' => date('d/m/Y'),
            'server_info' => $_SERVER,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ];
        Visit::create($arr);
    }

    static function trackerAfter($second){
        if(Session::get('last_session')){
            if(time() - Session::get('last_session') >= 30){
                VisitController::tracker();
            }
        }
        Session::put('last_session', time());
    }

    static function total(){
        return Visit::count();
    }
}
