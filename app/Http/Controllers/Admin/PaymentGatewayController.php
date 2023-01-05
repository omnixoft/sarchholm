<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaypalInfo;
use App\Models\StripeInfo;
use App\Payment\Paystack\PaystackPayment;
use App\Traits\ENVFilePutContent;
use App\ViewModels\IPaymentModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Paystack;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
// use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentGatewayController extends Controller
{
    use ENVFilePutContent;

    private $_paymentModel;

    public function __construct(IPaymentModel $model)
    {
        $this->_paymentModel = $model;
    }

    public function index()
    {
        $setting_paypal  = PaypalInfo::latest()->first();
        $setting_strip  = StripeInfo::latest()->first();
        return view('admin.payments.index',compact('setting_paypal','setting_strip'));
    }

    public function checkoutPage(Request $request)
    {
        $paymentInfo = request()->all();
        $user = auth()->user();
        $paymentInfo['amount'] = (int) $paymentInfo['price'];

        return view('admin.checkout',compact('paymentInfo','user'));
    }

    public function payment(Request $request)
    {
        $this->_paymentModel->initialize($request);

        notify()->success('Payment has been successfully processed');
        return redirect()->route('admin.credits.index');
    }

    public function paymentPaypal(Request $request)
    {
        return $this->_paymentModel->initialize($request);
    }

    public function PaystackHandleGatewayCallback()
    {
        return $this->_paymentModel->PaystackHandleGatewayCallback();
    }
    public function paypalStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('label','description','client_id','secret'),[
                'label' => 'required',
                'description' => 'required',
                'client_id' => 'required',
                'secret' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $data = [];
            $data['status'] = $request->status;
            $data['label'] = $request->label;
            $data['description'] = $request->description;
            $data['sandbox'] = $request->sandbox;

            $setting_paypal = PaypalInfo::latest()->first();

            $this->dataWriteInENVFile('PAYPAL_CLIENT_ID',$request->client_id);
            $this->dataWriteInENVFile('PAYPAL_SECRET',$request->secret);


            if (empty($setting_paypal)) {
                PaypalInfo::create($data);
            }else {
                PaypalInfo::whereId($setting_paypal->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }

    public function stripeStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('label','description','publishable_key','secret_key'),[
                'label' => 'required',
                'description' => 'required',
                'publishable_key' => 'required',
                'secret_key' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $data = [];
            $data['status'] = $request->status;
            $data['label'] = $request->label;
            $data['description'] = $request->description;

            $setting_strip = StripeInfo::latest()->first();

            $this->dataWriteInENVFile('STRIPE_KEY',$request->publishable_key);
            $this->dataWriteInENVFile('STRIPE_SECRET',$request->secret_key);

            if (empty($setting_strip)) {
                StripeInfo::create($data);
            }else {
                StripeInfo::whereId($setting_strip->id)->update($data);
            }
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }

    public function paystackStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('merchant_email','public_key','secret_key'),[
                'merchant_email' => 'required',
                'public_key' => 'required',
                'secret_key' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $this->dataWriteInENVFile('PAYSTACK_PUBLIC_KEY',$request->public_key);
            $this->dataWriteInENVFile('PAYSTACK_SECRET_KEY',$request->secret_key);
            $this->dataWriteInENVFile('MERCHANT_EMAIL',$request->merchant_email);
            
            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }

    public function razorpayStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('merchant_email','public_key','secret_key'),[
                'public_key' => 'required',
                'secret_key' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }


            $this->dataWriteInENVFile('RAZORPAY_KEY',$request->public_key);
            $this->dataWriteInENVFile('RAZORPAY_SECRET',$request->secret_key);

            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }
    public function redirectToGateway(Request $request)
    {
        dd(Paystack::getAuthorizationUrl()->redirectNow());
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
