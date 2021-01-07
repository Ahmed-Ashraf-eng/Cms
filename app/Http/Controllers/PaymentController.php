<?php

namespace App\Http\Controllers;

use App\Mail\UserWelcome;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{


    public function payment(){

        if(auth()->user()->stripe_id != null){
            return redirect('/home');
        }

        $avaliablePlans  = [
            'yearly'  => 'Yearly',
            'monthly' => 'Monthly'
        ];
         $data = [
             'intent' => auth()->user()->createSetupIntent(),
              'plans' =>   $avaliablePlans
         ];
        return view('auth.payment' )->with($data);
    }


    public function subscribe(Request $request){
        $user = auth()->user();
        $paymentMethod = $request->payment_method ;
        $planId = $request->plan ;
        $user->newSubscription('main', $planId)->create($paymentMethod);
        Mail::to(auth()->user()->email)->send(new UserWelcome(auth()->user()));
        return response([
           'success_url'=> redirect()->intended('/home')->getTargetUrl(),
            'message' => 'success'
        ]);

    }

}
