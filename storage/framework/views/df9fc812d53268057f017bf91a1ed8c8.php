<div class="block block-list block-cart">
    <div class="block-title"> Giỏ hàng </div>
    <div class="block-content">
      <?php if(Session::get('cart_items')): ?>
       <p class="block-subtitle">Các sản phẩm trong giỏ hàng</p>
       <ul id="cart-sidebar-widget" class="mini-products-list">
        <?php $total = 0; ?>
        <?php $__currentLoopData = Session::get('cart_items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $p = App\Models\Product::where('_id','=',$item['id_sanpham'])->take(1)->get()->toArray()[0];
          $total += $item['soluong'] * $p['prices'];
          if(isset($p['photos'][0]['aliasname']) && $p['photos'][0]['aliasname']){
            $img_path = env('APP_URL') . 'storage/images/thumb_800x800/' . $p['photos'][0]['aliasname'];
          } else {
            $img_path = env('APP_URL') .'assets/frontend/products-images/p1.jpg';
          }
        ?>
          <li class="item_<?php echo e($p['_id']); ?> item">
             <div class="item-inner">
                <a href="<?php echo e(env('APP_URL')); ?>chi-tiet-san-pham/<?php echo e($p['slug']); ?>" class="product-image"><img src="<?php echo e($img_path); ?>" width="80" alt="product"></a>
                <div class="product-details">
                   <div class="access">
                    <a href="<?php echo e(env('APP_URL')); ?>cart/remove/<?php echo e($p['_id']); ?>" class="remove-cart-item remove-item" name="<?php echo e($p['_id']); ?>" onclick="return false;"><span class="glyphicon glyphicon-trash"></span></a>
                    </div>
                   <strong><?php echo e($item['soluong']); ?></strong> x <span class="price"><?php echo e(number_format($p['prices'],0,",",".")); ?></span>
                   <p class="product-name"><a href="<?php echo e(env('APP_URL')); ?>chi-tiet-san-pham/<?php echo e($p['slug']); ?>"><?php echo e($p['title']); ?></a></p>
                </div>
             </div>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </ul>
       <p></p>
       <div class="summary">
          <p class="subtotal" id="subtotal_cart"><span class="label">Tổng cộng:</span> <span class="price"><?php echo e(number_format($total,0,",",".")); ?> VNĐ</span> </p>
       </div>
       <div class="ajax-checkout">
          <button type="button" title="Checkout" class="button button-checkout" onClick="window.location='<?php echo e(env('APP_URL')); ?>thanh-toan'"> <span>Thanh toán</span> </button>
       </div>
       <?php else: ?>
       <div class="summary">
          <p class="subtotal"><span class="price"></span> </p>
       </div>
       <?php endif; ?>
    </div>
</div>
<?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Frontend/widget_cart.blade.php ENDPATH**/ ?>