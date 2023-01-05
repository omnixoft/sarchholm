<?php
namespace App\Services;

use App\Repositories\IPackageRepository;
use App\Repositories\IPackageTranslationRepository;

class PackageService
{
    private $_packageRepository;
    private $_packageTranslationRepository;

    public function __construct(IPackageRepository $repository,IPackageTranslationRepository $translationRepository)
    {
        $this->_packageRepository = $repository;
        $this->_packageTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_packageRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_packageRepository->getById($id);
    }

    public function add($data)
    {
        $package = $this-> _packageRepository->add($data);
        $data['packageId'] = $package->id;
        $this->_packageTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_packageRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_packageRepository->delete($id);
    }
}