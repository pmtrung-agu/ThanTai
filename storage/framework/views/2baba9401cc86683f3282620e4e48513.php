
<?php $__env->startSection('body'); ?>
<div class="row">
    <div class="col-12">
        <div class="card-box text-center p-t-20">
            <img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/cover.png" class="thumb-img img-fluid"/>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Admin/index.blade.php ENDPATH**/ ?>