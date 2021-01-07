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
                    <h3 >Here you can see informations only for <b> users </b>  </h3>
                    <br>
                    <br>
                    <form class="input-group" action="<?php echo e(route('admin.search')); ?>" method="GET">
                        <input type="text" class="form-control" name="search" placeholder="Search">
                        <div class="input-group-addon">
                            <span class="input-group-text"><button type="submit" class="btn btn-success">Search</button></span>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </header><!-- /.header -->


<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <table   class="table table-dark">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Edit </th>
        <th>Delete</th>
        <th>Status</th>

        </thead>

        <tbody>


        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>

                <td><?php echo e($user->id); ?></td>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->role); ?></td>
                <td><?php echo e($user->created_at->diffForHumans()); ?></td>
                <td><?php echo e($user->updated_at->diffForHumans()); ?></td>
                <td><a href="<?php echo e(route('user.edit' , $user->id)); ?>"><button class="btn btn-success btn-sm">Edit</button></a></td>
                <td>
                    <form action="<?php echo e(route('user.destroy' , $user->id)); ?>" method="post">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
                <td>
                    <?php if($user->is_active == 1): ?>
                        <a href="<?php echo e(route('user.is_active' , $user->id)); ?>"><button class="btn btn-danger btn-sm">Deactivate</button></a>
                        <?php else: ?>
                        <a href="<?php echo e(route('user.is_active' , $user->id)); ?>"> <button class="btn btn-success btn-sm">Activate</button></a>
                        <?php endif; ?>
                </td>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\Projects\Cms with mailAPi , LoginApis , Stripe library\resources\views/admin/index.blade.php ENDPATH**/ ?>