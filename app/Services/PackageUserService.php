<?php
namespace App\Services;

use App\Repositories\IPackageRepository;
use App\Repositories\IPackageUserRepository;
use Carbon\Carbon;

class PackageUserService
{
    private $_packageUserRepository;
    private $_packageRepository;
    public function __construct(IPackageUserRepository $repository,IPackageRepository $packageRepository)
    {
        $this->_packageUserRepository = $repository;
        $this->_packageRepository = $packageRepository;
    }
    public function getByUser($id)
    {
        return $this->_packageUserRepository->getByUser($id);
    }
    public function update($data)
    {
        $package_user = $this->_packageUserRepository->getActivePackageById($data);
        $package = $this->_packageRepository->getById($package_user['package_id']);

        $item['price'] = (int) $package_user['price']-$package['credits'];
        $item['item'] = $package_user['item'] - 1;

        $this->_packageUserRepository->update($item,$data);
    }
    public function updatePackage()
    {
        $today = Carbon::now();
        $package_user = $this->_packageUserRepository->getAll();

        foreach($package_user as $data)
        {
            if($data->expire_at < $today->toDateTimeString())
            {
                $item['id'] = $data->id;
                $item['is_expired'] = 0;
                $item['price'] = 0;
                $item['item'] = 0;

                $this->_packageUserRepository->updatePackage($item);
            }
        }
    }

    public function getPackages($id)
    {
       return $this->_packageUserRepository->getPackages($id);
    }

    public function getActivePackagesById($id)
    {
        return $this->_packageUserRepository->getActivePackagesById($id);
    }
}