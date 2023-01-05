<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserTranslation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('admin.users.index',compact('user'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request,User $user)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->warning('This feature is disable for demo!');
            return redirect()->route('admin.users.index');
        }else{
            $locale = Session::get('currentLocal');
            request()->validate([
                'f_name'=> 'required',
                'l_name'=> 'required',
                'username'=> 'required',
                'type'=> 'nullable',
                'is_approved'=> 'nullable',
                'email'=> 'required',
                'mobile'=> 'nullable',
                'mobile_office' => 'nullable',
                'title'=> 'nullable',
                'company_name'=> 'nullable',
                'image'=> 'nullable',
                'description'=> 'nullable',
                'skype'=> 'nullable',
                'fb'=> 'nullable',
                'twitter'=> 'nullable',
                'instagram'=> 'nullable',
                'status'=> 'nullable'
            ]);

            $image = $request->file('image');
            $slug =  Str::slug($request->input('username'));

            if (isset($image))
            {
//                Storage::disk('public')->delete("users/{$user->image}");
                File::delete(public_path() . "/images/users/{$user->image}");

                $currentDate = Carbon::now()->toDateString();
                $fileName = $slug.'-'.$currentDate.'-'.uniqid();
                $image = Image::make($image)->encode('webp', 90)->fit(380, 400)->save(public_path('images/users/'  .  $fileName . '.webp'));
                $imageName = $image->basename;
            } else
            {
                $imageName = $user->image;
            }

            $user->update([
                'f_name'=> request('f_name'),
                'l_name'=> request('l_name'),
                'username'=> request('username'),
                'email'=> request('email'),
                'mobile'=> request('mobile'),
                'mobile_office' => request('mobile_office'),
                'title'=> request('title'),
                'company_name'=> request('company_name'),
                'image'=> $imageName,
                'description'=> request('description'),
                'skype'=> request('skype'),
                'fb'=> request('fb'),
                'twitter'=> request('twitter'),
                'instagram'=> request('instagram'),
                'status'=> request('status')
            ]);

            UserTranslation::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'locale'    => $locale,
                ], //condition
                [
                    'f_name'=> request('f_name'),
                    'l_name'=> request('l_name'),
                    'title'=> request('title'),
                    'company_name'=> request('company_name'),
                    'description'=> request('description'),
                ]
            );
            notify()->success('Profile Updated Successfully!');
            return redirect()->route('admin.users.index');
        }

    }

    public function destroy($id)
    {
        //
    }

    protected function validateUser()
    {
        return request()->validate([
            'f_name'=> 'required',
            'l_name'=> 'required',
            'username'=> 'required',
            'type'=> 'nullable',
            'is_approved'=> 'nullable',
            'email'=> 'required',
            'mobile'=> 'nullable',
            'mobile_office' => 'nullable',
            'title'=> 'nullable',
            'company_name'=> 'nullable',
            'image'=> 'nullable',
            'description'=> 'nullable',
            'skype'=> 'nullable',
            'fb'=> 'nullable',
            'twitter'=> 'nullable',
            'instagram'=> 'nullable',
            'status'=> 'nullable'
        ]);
    }
}
