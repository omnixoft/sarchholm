<?php
namespace App\Payment;

interface IPayment
{
    public function pay($data);
}