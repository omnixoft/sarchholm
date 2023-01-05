<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Mail\BookingRequest;
use App\Notifications\BookingNotfication;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class BookingRequestController extends Controller
{
    public function store()
    {
        request()->validate([
            'date' => 'required',
            'time' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message'=>'required'
        ]);

        $user = User::find(request('id'));

        $title = request('title');
        $address = request('address');
        $date = request('date');
        $time = request('time');
        $name = request('name');
        $phone = request('phone');
        $email = request('email');
        $message = request('message');

        $user->notify(new BookingNotfication($title,$address,$date,$time,$name,$phone,$email,$message));
        // Notification::send(request('email'), new SendMail());
        // Booking::create([
        //     'booking_id'=>'booking',
        //     'agent_id' => request('id'),
        //     'property_id' => request('property_id'),
        //     'booking_info' => request('comment'),
        //     'status' => 0,
        // ]
        // );

        $data = [];
        $data['title'] = request('title');
        $data['address'] = request('address');
        $data['date'] = request('date');
        $data['time'] = request('time');
        $data['name'] = request('name');
        $data['phone'] = request('phone');
        $data['email'] = request('email');
        $data['message'] = request('message');
        Mail::to($user->email)->send(new BookingRequest($data));
        return redirect()->back()->with('message','Your request is successfully submitted!');
    }
}
