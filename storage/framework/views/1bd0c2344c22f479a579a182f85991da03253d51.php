Hello <?php echo e($user->name); ?>

Thanks for creating an account . please verify your email using this link
<?php echo e(route('verify' , $user->verification_token)); ?>

<?php /**PATH C:\Users\Ahmed Sherif\Desktop\Femto15---AhmedSherif-master\resources\views/emails/welcome.blade.php ENDPATH**/ ?>