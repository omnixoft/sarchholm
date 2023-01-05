<?php
namespace App\SocialLogin;

use App\Traits\ENVFilePutContent;

class GithubLogin implements IGithubLogin
{
    use ENVFilePutContent;

    public function save($data)
    {
        $this->dataWriteInENVFile('GITHUB_CLIENT_ID',$data['client_id']);
        $this->dataWriteInENVFile('GITHUB_CLIENT_SECRET',$data['secret']);
    }
}