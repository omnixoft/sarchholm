<?php
namespace App\Payment\Paystack;

use App\Payment\IPayment;

interface IPaystackPayment extends IPayment
{
    public function handleGatewayCallback();
}
