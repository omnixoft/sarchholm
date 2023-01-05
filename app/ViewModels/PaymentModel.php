<?php
namespace App\ViewModels;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentModel implements IPaymentModel
{
    private $_paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->_paymentService = $paymentService;
    }

    public function initialize(Request $request)
    {
        
        $data = $request->all();
        return $this->_paymentService->initialize($data);
    }

    public function PaystackHandleGatewayCallback()
    {
        return $this->_paymentService->PaystackHandleGatewayCallback();
    }
}
