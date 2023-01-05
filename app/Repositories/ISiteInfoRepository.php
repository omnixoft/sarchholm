<?php
namespace App\Repositories;

interface ISiteInfoRepository extends IRepository
{
    public function getById($id);
}
