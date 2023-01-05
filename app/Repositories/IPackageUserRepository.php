<?php
namespace App\Repositories;

interface IPackageUserRepository extends IRepository
{
    public function getByUser($id);
    public function getPackages($id);
    public function updatePackage($data);
    public function getActivePackageById($id);
}