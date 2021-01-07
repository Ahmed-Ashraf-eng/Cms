

<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title> <?php echo $__env->yieldContent('title'); ?> </title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/page.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?php echo e(asset('img/apple-touch-icon.png')); ?>">
    <link rel="icon" href="<?php echo e(asset('img/favicon.png')); ?>">
</head>

<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="#">
                <img class="logo-dark" src="<?php echo e(asset('/img/logo-dark.png')); ?>" alt="logo">

               <a href="<?php echo e(route('admin.dashboard')); ?>"> <button class="btn btn-dark">Dashbord</button></a>
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

        </section>

        <a class="btn btn-xs btn-round btn-success" href="<?php echo e(route('login')); ?>">login</a>

    </div>
</nav><!-- /.navbar -->




<!-- Header -->
<?php echo $__env->yieldContent('header'); ?>


<!-- Main Content -->
<?php echo $__env->yieldContent('content'); ?>

<!-- Footer -->


<!-- Scripts -->
<script src="<?php echo e(asset('js/page.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/script.js')); ?>"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e16536b13587ad9"></script>

</body>
</html>
<?php /**PATH C:\Users\Ahmed Sherif\Desktop\Femto15---AhmedSherif-master\resources\views/layouts/admin.blade.php ENDPATH**/ ?>