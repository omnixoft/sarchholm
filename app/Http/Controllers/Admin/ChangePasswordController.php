<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('admin.users.change-password');
    }

    public function store(Request $request)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->back();
        }else{
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            notify()->success('Password changed successfully!');

//            return redirect()->back()->with('message', 'Password Changed Successfully!');
            return redirect()->back();
        }

    }
}
