<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\MessageReceived;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    // public function store()
    // {
    //     request()->validate([
    //         'name' => 'required',
    //         'phone' => 'required',
    //         'email' => 'required|email'
    //     ]);
    //     $user = User::find(request('id'));
    //     $name = request('name');
    //     $phone = request('phone');
    //     $email = request('email');
    //     $message = request('message');
    //     $user->notify(new MessageReceived($name,$phone,$email,$message));
    //     return redirect()->back()->with('message','Your message is successfully sent!');
    // }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->only('name','phone','email'),[
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email'
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $user = User::find(request('id'));
            $name = request('name');
            $phone = request('phone');
            $email = request('email');
            $message = request('message');
            $user->notify(new MessageReceived($name,$phone,$email,$message));

            return response()->json(['success' => __('Data Added successfully.')]);
        }
    }
}
