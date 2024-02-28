<!DOCTYPE html>
<html>
<head>
    <title>Email Order Invoice</title>
    <meta charset="UTF-8">
    <style type="text/css">
        .container {
            max-width: 1000px;
            margin: auto;
            background-color: #1a7518;
            padding: 30px;
            font-family: 'Roboto', sans-serif;
            color:#fff;
        }
        table {
            border: 1px solid #fff;
        }
        .container  a{
           color:#fff !important;
        }
    </style>
</head>
<body>
<div class="container">
    <img src="http://113.161.212.101:83//sanphamangiang/public/assets/frontend/images/logo.png" style="float:right" />
    <h2>Thông tin đơn hàng</h2>
    <h4>Mã đơn hàng: <?php echo e($code); ?></h4>
    <h4>Họ tên khách hàng: <?php echo e($customer['hoten']); ?></h4>
    <h4>Email: <?php echo e($customer['email']); ?></h4>
    <h4>Điện thoại: <?php echo e($customer['dienthoai']); ?></h4>
    <h4>Ngày đặt hàng: <?php echo e(App\Http\Controllers\ObjectController::getDate($customer['ngaydathang'], "d/m/Y H:i")); ?></h4>
    <h4>Ghi chú: <?php echo e($customer['ghichu']); ?></h4>
    <h2>Sản phẩm</h2>
    <?php if($products): ?>
    <?php
        $thanhtien = 0;
    ?>
    <table border="1" cellpadding="10" width="100%" style="border-collapse: collapse;">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Giảm giá</th>
            <th>Thành tiền</th>
        </tr>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $thanhtien += $product['total'];
        ?>
        <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($product['title']); ?></td>
            <td align="right"><?php echo e(number_format($product['quantity'],0,",",".")); ?></td>
            <td align="right"><?php echo e(number_format($product['prices'],0,",",".")); ?></td>
            <td align="right"><?php echo e(number_format($product['discount_amount'],0,",",".")); ?></td>
            <td align="right"><?php echo e(number_format($product['total'],0,",",".")); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <?php endif; ?>
    <h2 style="text-align:right;">Tổng cộng: <?php echo e(number_format($thanhtien,0,",",".")); ?> VNĐ</h2>
    <h2 style="text-align:center;">Cám ơn bạn đã đặt hàng trên <b>sanphamangiang.com</b></h2>
</div>
</body>
</html>

<?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Admin/Email/order.blade.php ENDPATH**/ ?>