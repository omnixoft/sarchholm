<?php
namespace App\SocialLogin;

use App\Traits\ENVFilePutContent;

class FacebookLogin implements IFacebookLogin
{
    use ENVFilePutContent;

    public function save($data)
    {
        $this->dataWriteInENVFile('FACEBOOK_CLIENT_ID',$data['client_id']);
        $this->dataWriteInENVFile('FACEBOOK_CLIENT_SECRET',$data['secret']);
    }
}