<?php $__env->startSection('title'); ?>

    Admin Panel

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <!-- Header -->
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
        <div class="container">

            <div class="row">
                <div class="col-md-8 mx-auto">

                    <h1>Welcome to admin panel <?php echo e(auth()->user()->name); ?></h1>
                    <h3 >Here you can modify only users </h3>

                </div>
            </div>

        </div>
    </header><!-- /.header -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <table   class="table table-dark">
        <thead>
        <th>Day</th>
        <th>Number of registed users</th>
        </thead>

        <tbody>

        <?php $__currentLoopData = $arrOfCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>

                <td><?php echo e($key); ?></td>
                <td><?php echo e($count); ?></td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ahmed Sherif\Desktop\Femto15---AhmedSherif-master\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>