<?php

namespace App\Http\Middleware;

use Closure;

class PaymentCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->stripe_id == null && !auth()->user()->isAdmin()){
            return redirect('/payment');
        }else{
            return $next($request);
        }
    }
}
