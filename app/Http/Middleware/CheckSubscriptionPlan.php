<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscriptionPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $checkSetting = Setting::where("subcription_expire_date", ">", now())->first();

        if(!empty($checkSetting)){
            return $next($request);
        }
   
        return redirect("error")->with([
            'message' => 'You are not able to access it! Please renew your subscription',
            'redirect_url' => '#',
        ]);; 
    }
}
