<?php $__env->startSection('content'); ?>

 <?php echo $__env->make('partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    You are logged in!
                        <br>
                        <br>
                    <h3>Hello <?php echo e(auth()->user()->role); ?> <?php echo e(auth()->user()->name); ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ahmed Sherif\Desktop\Femto15---AhmedSherif-master\resources\views/home.blade.php ENDPATH**/ ?>