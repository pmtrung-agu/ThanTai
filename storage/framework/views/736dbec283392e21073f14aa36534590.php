
<?php $__env->startSection('body'); ?>
<div class="page-heading">
    <div class="page-title">
        <h2>Đăng nhập</h2>
    </div>
</div>
<div class="main-container col1-layout wow bounceInUp animated animated" style="visibility: visible;">
    <div class="main">
        <div class="account-login container">
            <!--page-title-->
                <fieldset class="col2-set">
                    <form action="<?php echo e(env('APP_URL')); ?>dang-ky-tai-khoan" method="post" id="registerForm">
                    <div class="col-2 registered-users">
                        <strong>Chưa có tài khoản</strong>
                        <div class="content">
                            <p>Đăng ký thành viên.</p>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-success">
                                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <p class="required">* <?php echo e($error); ?></p>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="url" value="<?php echo e($url); ?>">
                            <ul class="form-list">
                                <li>
                                    <label for="email">Email Address<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="text" name="email" value="<?php echo e(old('email')); ?>" id="email" class="input-text required-entry validate-email" title="Email Address" required placeholder="Tài khoản người dùng (Email)">
                                    </div>
                                </li>
                                <li>
                                    <label for="pass">Password<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="password" name="password" value="<?php echo e(old('password')); ?>" class="input-text required-entry validate-password" id="password" title="Mật khẩu" required placeholder="Nhập mật khẩu">
                                    </div>
                                </li>
                                <li>
                                    <label for="pass">Họ tên<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="input-text required-entry validate-password" id="name" title="Họ tên" required placeholder="Họ tên">
                                    </div>
                                </li>
                                <li>
                                    <label for="pass">Điện thoại<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="tel" name="phone" value="<?php echo e(old('phone')); ?>" class="input-text required-entry validate-password" id="phone" title="Điện thoại" required placeholder="Số điện thoại">
                                    </div>
                                </li>
                            </ul>
                            <p class="required">* Bắt buộc điền thông tin</p>
                            <div class="buttons-set">
                                <button type="submit" title="Create an Account" class="button create-account"><span><span>Tạo tài khoản mới</span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <form action="<?php echo e(env('APP_URL')); ?>dang-nhap" method="post" id="loginForm">
                    <div class="col-2 registed-users">
                        <strong>Đăng nhập</strong>
                        <div class="content">
                            <p>Điền thông tin tài khoản đăng nhập</p>
                            <?php if(Session::has('msg_login')): ?>
                                <div class="alert alert-success">
                                    <p class="required"><?php echo e(Session::get('msg_login')); ?></p>
                                </div>
                            <?php endif; ?>
                            <ul class="form-list">
                            	<?php echo e(csrf_field()); ?>

                                <input type="hidden" name="url" value="<?php echo e($url); ?>">
                                <li>
                                    <label for="email">Email Address<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="text" name="email" value="<?php echo e(Session::get('email')); ?>" id="email" class="input-text required-entry validate-email" title="Email Address" required>
                                    </div>
                                </li>
                                <li>
                                    <label for="pass">Password<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="password" name="password" class="input-text required-entry validate-password" id="pass" title="Password" required>
                                    </div>
                                </li>
                            </ul>
                            <p class="required">* Bắt buộc điền thông tin</p>
                            <div class="buttons-set">
                                <button type="submit" class="button login" title="Login" name="send" id="send2"><span>Đăng nhập</span></button>
                            </div>
                            <!--buttons-set-->
                        </div>
                        <!--content-->
                    </div>
                    </form>
                    <!--col-2 registered-users-->
                </fieldset>
                <!--col2-set-->
            </form>
        </div>
        <!--account-login-->
    </div>
    <!--main-container-->
</div>
<!--col1-layout-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Frontend/login.blade.php ENDPATH**/ ?>