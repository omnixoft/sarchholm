<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;// Paystack package
use Auth;
use App\Student; // Student Model
use App\Payment; // Payment Model
use App\User;
use Unicodeveloper\Paystack\Facades\Paystack as FacadesPaystack;

class PaymentController extends Controller
{
    public function redirectToGateway(Request $request)
    {
        try{
            return FacadesPaystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }
}
