<?php
namespace App\Payment;
use Stripe\Stripe;
use Stripe\Charge;
use Carbon\Carbon;
use App\Models\Credit;

class StripePayment implements IStripePayment
{
    public function pay($data)
    {
        $amount = (int) request('amount');
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $today = Carbon::now();

        Credit::create($data);
        $user = auth()->user();
        $user->packages()->attach(
            $data['package_id'],
            ['property_id'=>1,
            'is_expired'=>0,
            'active_at'=>$today,
            'expire_at'=>$data['expire_at'],
            'price'=>$data['price'],
            'item'=>$data['item'],
            'status'=>1
            ]);

        Charge::create ([
            "amount" => $amount,
            "currency" => "inr",
            "source" => $data['stripeToken'],
            "description" => "Making test payment."
        ]);
    }

    public function payment($data)
    {
        $amount = (int) request('amount');
        // dd($amount);
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $today = Carbon::now();

        // Credit::create($request->all());
        $user = auth()->user();
        // $user->packages()->attach($request->package_id,['property_id'=>1,'is_expired'=>0,'active_at'=>$today,'expire_at'=>$request->expire_at,'price'=>$request->price,'item'=>$request->item,'status'=>1]);
        Charge::create ([
            "amount" => $amount,
            "currency" => "inr",
            "source" => $data['stripeToken'],
            "description" => "Making test payment."
        ]);
    }
}
