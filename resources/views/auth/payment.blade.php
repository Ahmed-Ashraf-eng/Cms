@extends('layouts.app')

@section('head')

    <script src="https://js.stripe.com/v3/"></script>


@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Payment</div>




                    <select id="plan" name="plan" class="form-control">
                        @foreach($plans as $key => $value)
                   <option value="{{$key}}">
                       {{$value}}
                   </option>
                            @endforeach
                    </select>

                    <br>
                    <input placeholder="card holder"  id="card-holder-name" type="text">
                    <br>

                    <!-- Stripe Elements Placeholder -->
                    <div id="card-element"></div>
                    <br>
                    <button class="btn btn-success btn-sm" id="card-button" data-secret="{{ $intent->client_secret }}">
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
@endsection

@section('js')

    <script>
        const stripe = Stripe('{{env('STRIPE_KEY')}}'   );

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


    @endsection
