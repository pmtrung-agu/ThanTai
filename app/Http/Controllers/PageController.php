<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Category;
use App\Models\Article;
use App\Models\User;
use App\Http\Controllers\VisitController;
use Session;
class PageController extends Controller
{
    //
    function __construct(){
        $product_categories = ProductCategory::All()->toArray();
        $categories = Category::orderBy('order','asc')->get()->toArray();
        $relates = Article::orderBy('updated_at','desc')->take(3)->get()->toArray();
        $doanhnghiep = User::where('website','<>', '')->where('roles','=','Seller')->get();
        VisitController::trackerAfter(30);
        $visits = VisitController::total(); Session::put('visits', $visits);
        View::share('product_categories', $product_categories);
        View::share('categories', $categories);
        View::share('relates', $relates);
        View::share('doanhnghiep', $doanhnghiep);
    }

    function quy_che_hoat_dong(){
        return view('Frontend.Page.quy_che_hoat_dong');
    }

    function chinh_sach_bao_hanh(){
        return view('Frontend.Page.chinh_sach_bao_hanh');
    }

    function quy_trinh_thanh_toan(){
        return view('Frontend.Page.quy_trinh_thanh_toan');
    }

    function chinh_sach_bao_mat_thong_tin(){
        return view('Frontend.Page.chinh_sach_bao_mat_thong_tin');
    }

    function quy_trinh_xu_ly_tranh_chap(){
        return view('Frontend.Page.quy_trinh_xu_ly_tranh_chap');
    }

    function chinh_sach_giao_nhan_van_chuyen(){
        return view('Frontend.Page.chinh_sach_giao_nhan_van_chuyen');
    }
}
