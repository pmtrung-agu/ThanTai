
<?php $__env->startSection('title'); ?> Thay đổi mật khẩu <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
	<div class="col-12">
		<div class="card-box">
			<h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Thay đổi mật khẩu</h3>
			<hr />
			<form action="<?php echo e(env('APP_URL')); ?>admin/user/update-password" method="post" id="dinhkemform" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" id="id" value="<?php echo e(Session::get('user._id')); ?>" />
                <div class="form-body">
                    <hr>
                    <?php if($errors->any()): ?>
                      <div class="alert alert-success">
                        <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                      </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label col-md-4 text-right p-t-10">Email</label>
                                <div class="col-md-8">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email (tài khoản)" value="<?php echo e(Session::get('user.email')); ?>" required readonly/>
                                </div>
                            </div>
                            <div class="form-group row">
                            	<label class="control-label col-md-4 text-right p-t-10">Mật khẩu cũ</label>
                                <div class="col-md-8">
                                    <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Mật khẩu cũ" value="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                            	<label class="control-label col-md-4 text-right p-t-10">Mật khẩu mới</label>
                                <div class="col-md-8">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu mới" value="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                            	<label class="control-label col-md-4 text-right p-t-10">Nhập lại mật khẩu mới</label>
                                <div class="col-md-8">
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu mới" value="" required>
                                </div>
                            </div>
                            <div class="row">
		                      <div class="col-md-12">
		                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
		                        <a href="<?php echo e(env('APP_URL')); ?>admin/user" class="btn btn-light"><i class="mdi mdi-reply-all"></i> Trở về</a>
		                      </div>
		                    </div>
                        </div>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Admin/User/change_password.blade.php ENDPATH**/ ?>