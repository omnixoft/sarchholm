<?php
namespace App\SocialLogin;

use App\Traits\ENVFilePutContent;

class GoogleLogin implements IGoogleLogin
{
    use ENVFilePutContent;

    public function save($data)
    {
        $this->dataWriteInENVFile('GOOGLE_CLIENT_ID',$data['client_id']);
        $this->dataWriteInENVFile('GOOGLE_CLIENT_SECRET',$data['secret']);
    }
}