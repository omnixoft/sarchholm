<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Newsletter;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        request()->validate([
            'email' => 'required|email'
        ]);


        if ( ! Newsletter::isSubscribed($request->email) )

        {
            Newsletter::subscribe(request('email'));


            return redirect()->back()->with('success', 'Thanks For Subscribe');

        }

        return redirect()->back()->with('failure', 'Sorry! You have already subscribed ');

    }
}
