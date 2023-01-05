<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\HeaderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $headerImage = HeaderImage::where('page','contact')->first();

        return view('frontend.contact',compact('headerImage'));
    }

    function send(Request $request)
    {
        // dd($request->all());
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message'=>'required'
        ]);

        $data = array(
            'name'      =>  $request->name,
            'email'     => $request->email,
            'message'   =>   $request->message
        );

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($data));
        return back()->with('message', 'Thanks for contacting us!');

    }
}
