<?php
namespace App\ViewModels;
use Illuminate\Http\Request;

interface IPaymentModel
{
    public function initialize(Request $request);
    public function PaystackHandleGatewayCallback();
}
