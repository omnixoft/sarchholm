<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ENVFilePutContent;
use App\ViewModels\SocialLoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    use ENVFilePutContent;

    private $_socialLoginModel;

    public function __construct(SocialLoginModel $model)
    {
        $this->_socialLoginModel = $model;
    }

    public function index()
    {
        return view('admin.social-login.index');
    }
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();
        $user = User::where('email','=',$providerUser->email)->first();

        if (!$user) {
            $user = User::create([
                'f_name' => $providerUser->name,
                'l_name'=>$providerUser->name,
                'username'=>$providerUser->name,
                'email' => $providerUser->email,
                'provider_id' => $providerUser->id,
                'image' => $providerUser->avatar,
            ]);
        }

        Auth::login($user);

        return redirect('/admin/dashboard');
    }

    public function facebookStoreOrUpdate(Request $request)
    {
        if ($request->ajax()) {
           return $this->_socialLoginModel->initialize($request);
        }
    }
}
