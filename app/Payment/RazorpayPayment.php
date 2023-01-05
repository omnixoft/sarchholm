<?php
namespace App\Payment;

use Carbon\Carbon;
use Razorpay\Api\Api;
use Exception;
use Illuminate\Support\Facades\Session;

class RazorpayPayment implements IRazorpayPayment
{
    public function pay($data)
    {
        $today = Carbon::now();
        $user = auth()->user();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($data['razorpay_payment_id']);



        if(count($data)  && !empty($data['razorpay_payment_id'])) {

            try {
                $response = $api->payment->fetch($data['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $user->packages()->attach($data['package_id'],['property_id'=>1,'is_expired'=>0,'active_at'=>$today,'expire_at'=>$data['expire_at'],'price'=>$data['price'],'item'=>$data['item'],'status'=>1]);
            } catch (Exception $e) {

                return  $e->getMessage();

                Session::put('error',$e->getMessage());

                return redirect()->route('admin.checkout.page');

            }

        }



        Session::put('success', 'Payment successful');

        return redirect()->route('admin.checkout.page');
    }
}
