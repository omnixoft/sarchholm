<?php
namespace App\Services;

use App\SocialLogin\IFacebookLogin;
use App\SocialLogin\IGithubLogin;
use App\SocialLogin\IGoogleLogin;

class SocialLoginService
{
    private $_facebookLogin;
    private $_googleLogin;
    private $_githubLogin;
    public function __construct(IFacebookLogin $facebookLogin, IGoogleLogin $googleLogin, IGithubLogin $githubLogin)
    {
        $this->_facebookLogin = $facebookLogin;
        $this->_googleLogin = $googleLogin;
        $this->_githubLogin = $githubLogin;
    }

    public function initialize($data)
    {
        $provider = $data['provider'];

        switch ($provider)
        {
            case 'facebook':
                return $this->_facebookLogin->save($data);
                break;
            case 'google':
                return $this->_googleLogin->save($data);
                break;
            case 'github':
                return $this->_githubLogin->save($data);
                break;
            default:
                return redirect()->back();
        }
    }
}