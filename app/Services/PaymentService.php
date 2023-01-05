<?php
namespace App\Services;

use App\Payment\IPayment;
use App\Payment\IPayPalPayment;
use App\Payment\IRazorpayPayment;
use App\Payment\IStripePayment;
use App\Payment\Paystack\IPaystackPayment;

class PaymentService
{
    private $_payPalPayment;
    private $_stripePayment;
    private $_razorpayPayment;
    private $_paystackPayment;
    
    public function __construct(
        IPayPalPayment $payPalPayment,
        IStripePayment $stripePayment,
        IRazorpayPayment $razorpayPayment,
        IPaystackPayment $paystackPayment)
    {
        $this->_payPalPayment = $payPalPayment;
        $this->_stripePayment = $stripePayment;
        $this->_razorpayPayment = $razorpayPayment;
        $this->_paystackPayment = $paystackPayment;
    }

    public function initialize($data)
    {
        $paymentType = $data['payment_type'];

        switch ($paymentType)
        {
            case 'stripe':
                return $this->_stripePayment->pay($data);
                break;
            case 'paypal':
                return $this->_payPalPayment->pay($data);
                break;
            case 'razorpay':
                return $this->_razorpayPayment->pay($data);
                break;
            case 'paystack':
                return $this->_paystackPayment->pay($data);
                break;
            default:
                return redirect()->back();
        }
    }

    public function PaystackHandleGatewayCallback()
    {
        return $this->_paystackPayment->handleGatewayCallback();
    }


}
