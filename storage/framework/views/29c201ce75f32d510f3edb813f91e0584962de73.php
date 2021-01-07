Hello <?php echo e($user->name); ?>

Thanks for creating an account . please verify your email using this link
<?php echo e(route('verify' , $user->verification_token)); ?>

<?php /**PATH C:\xampp\htdocs\Laravel\Projects\Cms with mailAPi , LoginApis , Stripe library\resources\views/emails/welcome.blade.php ENDPATH**/ ?>