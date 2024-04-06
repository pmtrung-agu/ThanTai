<div class="block block-list block-cart">
    <div class="block-title"> Giỏ hàng </div>
    <div class="block-content">
      @if(Session::get('cart_items'))
       <p class="block-subtitle">Các sản phẩm trong giỏ hàng</p>
       <ul id="cart-sidebar-widget" class="mini-products-list">
        @php $total = 0; @endphp
        @foreach(Session::get('cart_items') as $item)
        @php
          $p = App\Models\Product::where('_id','=',$item['id_sanpham'])->take(1)->get()->toArray()[0];
          $total += $item['soluong'] * $p['prices'];
          if(isset($p['photos'][0]['aliasname']) && $p['photos'][0]['aliasname']){
            $img_path = env('APP_URL') . 'storage/images/thumb_800x800/' . $p['photos'][0]['aliasname'];
          } else {
            $img_path = env('APP_URL') .'assets/frontend/products-images/p1.jpg';
          }
        @endphp
          <li class="item_{{ $p['_id'] }} item">
             <div class="item-inner">
                <a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $p['slug'] }}" class="product-image"><img src="{{ $img_path }}" width="80" alt="product"></a>
                <div class="product-details">
                   <div class="access">
                    <a href="{{ env('APP_URL') }}cart/remove/{{ $p['_id'] }}" class="remove-cart-item remove-item" name="{{ $p['_id'] }}" onclick="return false;"><span class="glyphicon glyphicon-trash"></span></a>
                    </div>
                   <strong>{{ $item['soluong'] }}</strong> x <span class="price">{{ number_format($p['prices'],0,",",".") }}</span>
                   <p class="product-name"><a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $p['slug'] }}">{{ $p['title'] }}</a></p>
                </div>
             </div>
          </li>
        @endforeach
       </ul>
       <p></p>
       <div class="summary">
          <p class="subtotal" id="subtotal_cart"><span class="label">Tổng cộng:</span> <span class="price">{{ number_format($total,0,",",".") }} VNĐ</span> </p>
       </div>
       <div class="ajax-checkout">
          <button type="button" title="Checkout" class="button button-checkout" onClick="window.location='{{ env('APP_URL') }}thanh-toan'"> <span>Thanh toán</span> </button>
       </div>
       @else
       <div class="summary">
          <p class="subtotal"><span class="price"></span> </p>
       </div>
       @endif
    </div>
</div>
