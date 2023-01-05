<?php
namespace App\Traits;

trait ENVFilePutContent{

    public function dataWriteInENVFile($key,$value)
    {
        $path = '.env';
        $searchArray = array($key.'='.env($key));
        $replaceArray= array($key.'='.$value);

        file_put_contents($path, str_replace($searchArray, $replaceArray, file_get_contents($path)));
    }

}
