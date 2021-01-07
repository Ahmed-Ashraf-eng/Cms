<?php $__env->startSection('head'); ?>

    <script src="https://js.stripe.com/v3/"></script>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Payment</div>




                    <select id="plan" name="plan" class="form-control">
                        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($key); ?>">
                       <?php echo e($value); ?>

                   </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <br>
                    <input placeholder="card holder"  id="card-holder-name" type="text">
                    <br>

                    <!-- Stripe Elements Placeholder -->
                    <div id="card-element"></div>
                    <br>
                    <button class="btn btn-success btn-sm" id="card-button" data-secret="<?php echo e($intent->client_secret); ?>">
                        Complete Registration
                    </button>
                    <br>
                    <h4  id="wait" style="color: white">Please wait a moment  </h4>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script>
        const stripe = Stripe('<?php echo e(env('STRIPE_KEY')); ?>'   );

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;



        cardButton.addEventListener('click', async (e) => {
            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );

            if (error) {
                alert('Somthing went wrong please try again');
            } else {

                document.getElementById("wait").style.color = "blue";
                const plan = document.getElementById('plan').value;
                console.log(plan);
                axios.post('/subscribe', {
                    payment_method: setupIntent.payment_method,
                    plan: plan
                }).then((data)=>{
                    location.replace(data.data.success_url)
                });
            }
        });

    </script>


    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\Projects\Cms with mailAPi , LoginApis , Stripe library\resources\views/auth/payment.blade.php ENDPATH**/ ?>