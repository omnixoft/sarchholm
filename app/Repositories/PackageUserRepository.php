<?php
namespace App\Repositories;

use App\Models\PackageUser;

class PackageUserRepository extends Repository implements IPackageUserRepository
{
    public function __construct(PackageUser $packageUser)
    {
        parent::setModel($packageUser);
    }

    public function getAll()
    {
        return parent::getAll();
    }

    public function getById($id)
    {
        return parent::get($id);
    }
    public function getActivePackageById($id)
    {
        return PackageUser::where('id',$id)->where('is_expired',0)->first();
    }
    public function getByUser($id)
    {
        return PackageUser::with('package','user')->where('user_id',$id)->get();
    }
    public function getPackages($id)
    {
       return  PackageUser::where('user_id',$id)->where('is_expired',0)->get();
    }
    public function add($data)
    {
        return parent::add($data);
    }
    public function update($data,$id)
    {
//        parent::update($data,$id);
        $package = $this->getById($id);
        $package->update($data);
    }
    public function updatePackage($data)
    {
        $packageUser = $this->getById($data['id']);
        $packageUser->update($data);
    }
    public function delete($id)
    {
        parent::delete($id);
    }
}