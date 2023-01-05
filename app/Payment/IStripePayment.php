<?php
namespace App\Payment;

interface IStripePayment extends IPayment
{
    public function payment($data);
}
