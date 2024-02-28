<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Category;
use App\Models\Article;
use App\Models\Address;
use App\Models\Order;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\AddressController;
use App\Models\User;
use App\Models\Views;
use App\Models\MarketPrice;
use App\Models\Logistic;
use App\Models\Shopping;
use App\Models\Promotion;
use Session; use Redirect;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\VisitController;
use Response;
use Illuminate\Support\Arr;
class FrontendController extends Controller
{
    //
    function __construct(){
        $product_categories = ProductCategory::where('status','=',1)->orderBy('order','asc')->get()->toArray();
        $categories = Category::orderBy('order','asc')->get()->toArray();
        $doanhnghiep = User::where('website','<>', '')->where('roles','=','Seller')->get();
        View::share('product_categories', $product_categories);
        View::share('categories', $categories);
        View::share('doanhnghiep', $doanhnghiep);
    }

    static function shuffle_assoc(&$array) {
      $new = array();
      $keys = array_keys($array);
      shuffle($keys);
      foreach($keys as $key) {
        $new[$key] = $array[$key];
      }
      $array = $new;
      return $array;
    }

    function index(Request $request){
      VisitController::trackerAfter(30);
      $visits = VisitController::total(); Session::put('visits', $visits);
      //$products_hot = Product::where('hot','=', 1)->where('status','=', 1)->take(12)->get()->toArray();
      //$products_hot = self::shuffle_assoc($products_hot);
      $current_date = ObjectController::setDate();
      $promotions = Promotion::where('date_from', '<=', $current_date)->where('date_to', '>=', $current_date)->get();
      $articles = Article::orderBy('updated_at','desc')->take(3)->get()->toArray();
      $promotions_soon = Promotion::where('date_from', '>', $current_date)->paginate(30);
      return view('Frontend.index')->with(compact('promotions', 'promotions_soon', 'articles'));
    }

    function san_pham(Request $request, $slug = ''){
        if($slug){
          $category = ProductCategory::where('slug' , '=', $slug)->first();
          $category_title = 'Sản phẩm: ' . $category['title'];
          $id_product_category = strval($category['_id']);
          $products = Product::where('status','=',1)->where('prices', '>', 0)->where('id_product_category','=',$id_product_category)->orderBy('updated_at','desc')->paginate(12);
        } else {
          $products = Product::where('status','=',1)->where('prices', '>', 0)->orderBy('updated_at','desc')->paginate(12);
          $category_title = 'Danh sách Sản phẩm';
        }
        return view('Frontend.products')->with(compact('products', 'category_title', 'slug'));
    }

    function san_pham_noi_bat(){
      $products = Product::where('hot','=', 1)->where('status','=',1)->where('prices', '>', 0)->orderBy('updated_at','desc')->paginate(12);
      $category_title = 'Sản phẩm nổi bật';
      return view('Frontend.products')->with(compact('products', 'category_title'));
    }

    function chi_tiet_san_pham(Request $request, $slug = ''){
        if($slug){
            $product = Product::where('status','=',1)->where('slug','=',$slug)->take(1)->get()->toArray();
            $product = isset($product[0]) ? $product[0] : '';
            $relate_products = Product::where('status','=',1)->where('prices', '>', 0)->whereIn('id_product_category', $product['id_product_category'])->get()->toArray();
        } else {
            $product = '';$relate_products='';
        }

        $current_date = ObjectController::setDate();
        $promotion = Promotion::where('id_products', $product['_id'])->where('date_from', '<=', $current_date)->where('date_to', '>=', $current_date)->first();
        return view('Frontend.product_detail')->with(compact('product','relate_products', 'promotion'));
    }

    function tim_kiem_san_pham(Request $request){
      $s = $request->input('s');
      $products = Product::where('status','=',1)->where('prices','>',0)->where('title', 'regexp', '/.*'.$s.'/i')->get()->toArray();
      return view('Frontend.search')->with(compact('s', 'products'));
    }

    function category(Request $request, $slug = ''){
      if($slug){
          $category = Category::where('slug','=',$slug)->first()->toArray();
          $articles = Article::where('id_category',strval($category['_id']))->orderBy('updated_at','desc')->get()->toArray();
      } else {
          $articles = Article::orderBy('updated_at','desc')->get()->toArray();
      }
      return view('Frontend.category')->with(compact('articles'));
    }

    function article(Request $request, $slug = ''){
      $article = Article::where('slug','=',$slug)->first();
      $article = isset($article) ? $article : '';
      $relates = Article::orderBy('updated_at','desc')->take(4)->get()->toArray();
      return view('Frontend.article')->with(compact('article','relates'));
    }

    function sellers(Request $request){
      $sellers = User::where('roles', 'Seller')->orderBy('updated_at','desc')->paginate(12);
      return view('Frontend.sellers')->with(compact('sellers'));
    }

    function seller_products(Request $request, $slug){
      $seller = User::where('slug', '=', $slug)->first();
      $id_seller = ObjectController::ObjectId($seller['_id']);
      $products = Product::where('status','=',1)->where('id_seller', '=', $id_seller)->orderBy('updated_at','desc')->paginate(12);

      return view('Frontend.seller_products')->with(compact('seller','products', 'slug'));
    }

    function seller_intro(Request $request, $slug = ''){
      $seller = User::where('slug','=',$slug)->first();
      $relates = User::where('slug','<>', $slug)->where('roles', 'Seller')->where('gioi_thieu','exists', true)->where('gioi_thieu','<>',"")->orderBy('updated', 'desc')->take(12)->get()->toArray();
      $id_seller = ObjectController::ObjectId($seller['_id']);
      $products = Product::where('id_seller','=',$id_seller)->take(12)->get()->toArray();
      return view('Frontend.seller_intro')->with(compact('seller','relates','products'));
    }

    function cart(Request $request){
      $provinces = Address::where('matructhuoc','=','')->get()->toArray();
      return view('Frontend.cart')->with(compact('provinces'));
    }

    function add_cart(Request $request, $id_product = null, $quantity = 1){
      $cart_items = $request->session()->get('cart_items');
      if($cart_items){
        $blnExists = false;
        foreach($cart_items as $key => $value){
          if($id_product == $value['id_sanpham']){
            $new_soluong  = $value['soluong'] + intval($quantity);
            $cart_items[$key] = array('id_sanpham' => $id_product,  'soluong' => intval($new_soluong));
            $blnExists = true;
          }
        }
        if($blnExists == false){
            $cart_items[] = array('id_sanpham' => $id_product, 'soluong' => intval($quantity));
        }
      } else {
        $cart_items[] = array('id_sanpham' => $id_product, 'soluong' => intval($quantity));
      }
      $request->session()->put('cart_items', $cart_items);
      //echo count($cart_items);
      $product_list = '';$count = 0; $total = 0;$product_list_widget = '';
      if($cart_items){
        foreach($cart_items as $key => $item){
          $p = Product::where('_id', '=', $item['id_sanpham'])->take(1)->get()->toArray()[0];
          $count += $item['soluong']; $total += $item['soluong'] * $p['prices'];
          if(isset($p['photos'][0]['aliasname']) && $p['photos'][0]['aliasname']){
            $img_path = env('APP_URL').'storage/images/thumb_800x800/' . $p['photos'][0]['aliasname'];
          } else {
            $img_path = env('APP_URL').'assets/frontend/products-images/p4.jpg';
          }
          $product_list .= '
            <li class="item_'.$p['_id'].' item">
              <div class="item-inner">
                <a class="product-image" title="'.$p['title'].'" href="">
                  <img alt="'.$p['title'].'" src="'.$img_path.'">
                </a>
                <div class="product-details">
                  <div class="access"><a class="btn-remove remove-cart-item" title="'.$p['title'].'" name="'.$p['_id'].'" href="'.env('APP_URL').'cart/remove/'.$p['_id'].'" onclick="return false;"><span class="glyphicon glyphicon-trash"></span></a></div>
                  <strong>'.$item['soluong'].'</strong> x <span class="price">'.number_format($p['prices'],0,",",".").'</span>
                  <p class="product-name"><a href="'.env('APP_URL').'chi-tiet-san-pham/'.$p['slug'].'">'.$p['title'].'</a></p>
                </div>
              </div>
            </li>
          ';
          $product_list_widget .= '<li class="item_'. $p['_id'].' item">
             <div class="item-inner">
                <a href="#" class="product-image"><img src="'.$img_path.'" width="80" alt="'.$p['title'].'"></a>
                <div class="product-details">
                   <div class="access">
                    <a href="'.env('APP_URL').'cart/remove/'.$p['_id'].'" class="remove-cart-item remove-item" name="'.$p['_id'].'" onclick="return false;"><span class="glyphicon glyphicon-trash"></span></a>
                    </div>
                   <strong>'.$item['soluong'].'</strong> x <span class="price">'.number_format($p['prices'],0,",",".").'</span>
                   <p class="product-name"><a href="'.env('APP_URL').'chi-tiet-san-pham/'.$p['slug'].'">'.$p['title'] .'</a></p>
                </div>
             </div>
          </li>';
        }
      }
      echo json_encode(array('products' => $product_list, 'products_widget' => $product_list_widget, 'count' => $count ? number_format($count,0,",",".") : '0', 'total' => $total ? number_format($total,0,",",".") : '0'));
    }

    function remove_cart(Request $request, $id_product = null){
      $cart_items = $request->session()->get('cart_items');
      if($cart_items){
        foreach($cart_items as $key => $value){
          if($id_product == $value['id_sanpham']){
            unset($cart_items[$key]);
          }
        }
      }
      $request->session()->put('cart_items', $cart_items);
      $product_list = '';$count = 0; $total = 0;$product_list_widget = '';
      if($cart_items){
        foreach($cart_items as $key => $item){
          $p = Product::where('_id', '=', $item['id_sanpham'])->take(1)->get()->toArray()[0];
          $count += $item['soluong']; $total += $item['soluong'] * $p['prices'];
          if(isset($p['photos'][0]['aliasname']) && $p['photos'][0]['aliasname']){
            $img_path = env('APP_URL').'storage/images/thumb_800x800/' . $p['photos'][0]['aliasname'];
          } else {
            $img_path = env('APP_URL').'assets/frontend/products-images/p4.jpg';
          }
          $product_list .= '
          <li class="item_'.$p['_id'].' item">
            <div class="item-inner">
              <a class="product-image" title="'.$p['title'].'" href="">
                <img alt="'.$p['title'].'" src="'.$img_path.'">
              </a>
              <div class="product-details">
                <div class="access"><a class="btn-remove remove-cart-item" title="'.$p['title'].'" href="'.env('APP_URL').'cart/remove/'.$p['_id'].'" name="'.$p['_id'].'" onclick="return false;"><span class="glyphicon glyphicon-trash"></span></a></div>
                <strong>'.$item['soluong'].'</strong> x <span class="price">'.number_format($p['prices'],0,",",".").'</span>
                <p class="product-name"><a href="'.env('APP_URL').'chi-tiet-san-pham/'.$p['slug'].'">'.$p['title'].'</a></p>
              </div>
            </div>
          </li>';
          $product_list_widget .= '<li class="item_'. $p['_id'].' item">
             <div class="item-inner">
                <a href="#" class="product-image"><img src="'.$img_path.'" width="80" alt="'.$p['title'].'"></a>
                <div class="product-details">
                   <div class="access">
                    <a href="'.env('APP_URL').'cart/remove/'.$p['_id'].'" class="remove-cart-item remove-item" name="'.$p['_id'].'" onclick="return false;"><span class="glyphicon glyphicon-trash"></span></a>
                    </div>
                   <strong>'.$item['soluong'].'</strong> x <span class="price">'.number_format($p['prices'],0,",",".").'</span>
                   <p class="product-name"><a href="'.env('APP_URL').'chi-tiet-san-pham/'.$p['slug'].'">'.$p['title'] .'</a></p>
                </div>
             </div>
          </li>';
        }
      }
      echo json_encode(array('products' => $product_list, 'products_widget' => $product_list_widget, 'count' => number_format($count,0,",","."), 'total' => number_format($total,0,",",".")));
    }

    function update_cart(Request $request){
      $data = $request->all();
      $cart_items = array();
      if(isset($data['id_sanpham']) && $data['id_sanpham']){
        foreach($data['id_sanpham'] as $key => $sp){
          $cart_items[] = array('id_sanpham' => $sp, 'soluong' => $data['soluong'][$key]);
        }
      }
      $request->session()->put('cart_items', $cart_items);
      return redirect()->intended(env('APP_URL') . 'gio-hang');
    }

    function checkout(Request $request){
      $order = new Order();
      $madonhang = strtoupper(uniqid());
      $data = $request->all();
      $cart_items = $request->session()->get('cart_items');
      $customer = $request->session()->get('customer');
      $arr_sanpham = array();$sanpham_seller = array();
      $shipping = isset($data['shipping']) ? $data['shipping'] : 0;
      $arr_customer  = array(
        'id_customer' => isset($customer['_id']) ? ObjectController::ObjectId($customer['_id']) : '',
        'hoten' => $data['hoten'],
        'dienthoai' => $data['dienthoai'],
        'email' => $data['email'],
        'diachi' => AddressController::getDiaChi($data['diachi']),
        'ghichu' => $data['ghichu'],
        'ngaydathang' =>ObjectController::setDate()
      );
      if($cart_items){
        foreach($cart_items as $c){
          $p = Product::find($c['id_sanpham']);
          $current_date = ObjectController::setDate();
          $pro = Promotion::where('id_products', $p['_id'])->where('date_from','<=', $current_date)->where('date_to', '>=', $current_date)->first();
          $discount_amount = 0;$discount = '';
          if($pro && $pro->count() > 0){
            $discount = $pro['discount'];
            if($pro['discount'] == '%'){
              $discount_amount = $p['prices'] * $pro['amount']/100;
            } else {
              $discount_amount = $pro['amount'];
            }
          }
          $thanhtien = $c['soluong'] * ($p['prices'] - $discount_amount);
          $id_seller = strval($p['id_seller']);
          array_push($arr_sanpham, array(
              'id_sanpham' => $c['id_sanpham'],
              'title' => $p['title'],
              'prices' => $p['prices'],
              'discount' => $discount,
              'discount_amount' => $discount_amount,
              'quantity' => $c['soluong'],
              'total' => $thanhtien,
              'id_seller' => ObjectController::ObjectId($p['id_seller']),
              'status' => 0));
          $sanpham_seller[$id_seller][] = array(
            'id_sanpham' => $c['id_sanpham'],
            'title' => $p['title'],
            'prices' => $p['prices'],
            'discount' => $discount,
            'discount_amount' => $discount_amount,
            'quantity' => $c['soluong'],
            'total' => $thanhtien,
            'id_seller' => ObjectController::ObjectId($p['id_seller']),
            'status' => 0);
        }
        $order->code = $madonhang;
        $order->customer = $arr_customer;
        $order->products = $arr_sanpham;
        $order->shipping = doubleval($shipping);
        $order->save();
        $msg = 'Success';
        $to_name = 'Chiếu UZU Tân Châu Long';
        $to_email = 'trungminhphan@gmail.com';
        $from_email = env('MAIL_FROM_ADDRESS');
        $data = array('code' => $madonhang, 'customer' => $arr_customer, 'products' => $arr_sanpham);
        //SEND TO ADMIN
        Mail::send('Admin.Email.order', $data, function($message) use ($to_name, $to_email, $madonhang) {
          $message->to($to_email, $to_name)->subject('[CHIEU_UZU] Đơn hàng mới ['.$madonhang.']');
          $message->from('trungminhphan@gmail.com', 'Chiếu UZU Tân Châu Long');
        });
        /*Mail::send('Admin.Email.order', $data, function($message) use ($to_name, $to_email, $madonhang) {
          $message->to('trungminhphan@gmail.com', $to_name)->subject('[CHIEU_UZU] Đơn hàng mới ['.$madonhang.']');
          $message->from('trungminhphan@gmail.com', 'Chiếu UZU Tân Châu Long');
        });*/
        //SEND TO CUSTOMER
        foreach($sanpham_seller as $key => $value){
          $seller = User::find($key);
          $to_name = '[ĐƠN HÀNG MỚI] Chiếu UZU Tân Châu Longg';
          $to_email = $seller['email'];
          $data = array('code' => $madonhang, 'customer' => $arr_customer, 'products' => $sanpham_seller[$key]);
          Mail::send('Admin.Email.order', $data, function($message) use ($to_name, $to_email, $madonhang) {
            $message->to($to_email, $to_name)->subject('[CHIEU_UZU] Đơn hàng mới ['.$madonhang.']');
            $message->from('trungminhphan@gmail.com', 'Chiếu UZU Tân Châu Long');
          });
        }
        $request->session()->pull('cart_items');
      } else {
        $msg = 'Failed';
      }
      $request->session()->put('customer', $arr_customer);
      return view('Frontend.checkout_confirm')->with(compact('msg'));
    }
    /*function send_email(){
      $to_name = 'Sản phẩm An Giang';
      $to_email = 'sanphamangiang@gmail.com';
      $data = array('name' => 'Phan Minh Trung', 'body' => 'Nội dung email');
      Mail::send('Admin.Email.order', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)->subject('Đơn hàng mới trên sanphamangiang.com');
        $message->from('sanphamangiang@gmail.com', 'Sản Phẩm An Giang [sanphamangiang.com]');
      });
      return view('Admin.Email.order');
    }*/


    function lien_he(){
        return view('Frontend.contacts');
    }

    function orders(){
      return view('Frontend.orders');
    }

    function account(){
      return view('Frontend.account');
    }

    function login(Request $request){
      $url = $request->input('url');
      return view('Frontend.login')->with(compact('url'));
    }

    function login_submit(Request $request){
      $data = $request->all();
      if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'active' => 1])) {
        $user = User::where('email', '=', $data['email'])->take(1)->get()->toArray();
        $request->session()->put('customer', $user[0]);
        if($data['url']){
          return redirect()->intended(env('APP_URL') . $data['url']);
        } else {
          return redirect()->intended(env('APP_URL'));
        }
      } else {
        Session::flash('msg_login', "Không thể đăng nhập, vui lòng kiểm tra mật khẩu và email");
        Session::flash('email', $data['email']);
        return Redirect::back();
        //return redirect()->intended(env('APP_URL') . $data['url'])->with;
      }
    }

    function gia_ca_thi_truong(){
      $marketprice = MarketPrice::orderby('created_at', 'desc')->get()->toArray();
      return view('Frontend.gia_ca_thi_truong')->with(compact('marketprice'));
    }

    function gia_ca_thi_truong_download(Request $request, $id=''){
      $mp = MarketPrice::find($id);
      if($mp['dinhkem']){
        $file= 'storage/files/' . $mp['dinhkem'][0]['aliasname'];
        $filename = str_slug($mp['dinhkem'][0]['title']). '.' .  $mp['dinhkem'][0]['type'];
        return Response::download($file,  $filename);
      } else {
        echo 'Tập tin không tồn tại';
      }
    }

    function gia_ca_thi_truong_view(Request $request, $id=''){
      $mp = MarketPrice::find($id);
      if($mp['dinhkem']){
        $src = 'https://view.officeapps.live.com/op/view.aspx?src='.env('APP_URL').'storage/files/'.$mp['dinhkem'][0]['aliasname'];
        echo '<iframe id="view_pdf_html" src="'.$src.'" style="width:100%;height:95vh;overflow:scroll;"></iframe>';
      } else {
        echo 'Tập tin không tồn tại';
      }
    }

    function logistic(){
      $logistic = Logistic::All();
      return view("Frontend.logistic")->with(compact('logistic'));
    }

    function logistic_detail(Request $request, $id = ''){
      $logistic = Logistic::find($id);
      return view("Frontend.logistic_detail")->with(compact('logistic'));
    }

    function logistic_download(Request $reuqest, $id = '', $key = 0){
      $log= Logistic::find($id);
      if($log['dinhkem']){
        $file= 'storage/files/' . $log['dinhkem'][$key]['aliasname'];
        $filename = str_slug($log['dinhkem'][$key]['title']). '.' .  $log['dinhkem'][$key]['type'];
        return Response::download($file,  $filename);
      } else {
        echo 'Tập tin không tồn tại';
      }
    }

    function shopping(){
      $shopping = Shopping::orderBy('updated_at','desc')->paginate(12);
      return view('Frontend.diem_mua_sam_dat_chuan')->with(compact('shopping'));
    }

    function shopping_detail(Request $request, $slug = ''){
      $shop = Shopping::where('slug','=',$slug)->first();
      return view('Frontend.diem_mua_sam_dat_chuan_chi_tiet')->with(compact('shop'));
    }

    function flash_sale(){
      $current_date = ObjectController::setDate();
      $promotions = Promotion::where('date_from', '<=', $current_date)->where('date_to', '>=', $current_date)->paginate(30);
      $flash_sale = Promotion::where('date_from', '<=', $current_date)->where('date_to', '>=', $current_date)->first();
      $flash_sale_soon = Promotion::orderBy('date_from', 'asc')->where('date_from', '>', $current_date)->distinct('date_from')->get();$flash_sale_soon = Promotion::where('date_from', '>', $current_date)->distinct()->orderBy('date_from', 'asc')->get(['date_from']);
      if(!$flash_sale){
        return redirect(env('APP_URL') . 'flash-sale-soon?date_from='.$flash_sale_soon[0]->milliseconds);
      } else {
        return view('Frontend.flash_sale')->with(compact('promotions', 'flash_sale', 'flash_sale_soon'));
      }
    }

    function flash_sale_soon(Request $request){
      $current_date = ObjectController::setDate();
      $date_from = $request->input('date_from');
      if($date_from){
        $date = ObjectController::getDate($date_from, "Y-m-d H:i:s");
        $date = ObjectController::setConvertDate($date);
        $promotions = Promotion::where('date_from', '=', $date)->paginate(30);
      } else {
        $promotions = Promotion::where('date_from', '>', $current_date)->paginate(30);
      }
      $flash_sale = Promotion::where('date_from', '<=', $current_date)->where('date_to', '>=', $current_date)->first();
      $flash_sale_soon = Promotion::where('date_from', '>', $current_date)->distinct()->orderBy('date_from', 'asc')->get(['date_from']);
      return view('Frontend.flash_sale_soon')->with(compact('promotions','flash_sale','flash_sale_soon', 'date_from'));
    }
}
