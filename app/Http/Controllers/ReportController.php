<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObjectController;
use Analytics;
use Spatie\Analytics\Period;

class ReportController extends Controller
{
    //
    function dashboard(Request $request){
        if(AuthController::isRole('Admin')){
            $products = Product::count();
            $sellers = User::where('roles', '=', 'Seller')->count();
            $orders = Order::count();
        } else {
            $id_user = $request->session()->get('user._id');
            $id_seller = ObjectController::ObjectId($id_user);
            $products = Product::where('id_seller', '=', $id_seller)->count();
            $sellers = User::where('roles', '=', 'Seller')->count();
            $orders = Order::where('products.id_seller', '=', $id_seller)->count();
        }
    	return view('Admin.Report.dashboard')->with(compact('products','sellers','orders'));
        //$analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        //dd($analyticsData);
    }
}
