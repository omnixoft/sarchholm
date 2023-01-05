<?php
namespace App\Services;

use App\Repositories\ICityRepository;
use App\Repositories\ICityTranslationRepository;
use App\Repositories\IImageRepository;
use App\Repositories\IPackageUserRepository;
use App\Repositories\IPropertyDetailRepository;
use App\Repositories\IPropertyRepository;
use App\Repositories\IPropertyTranslationRepository;
use Carbon\Carbon;

class PropertyService
{
    private $_propertyRepository;
    private $_propertyTranslationRepository;
    private $_packageUserService;
    private $_propertyDetailService;
    private $_imageRepository;
    private $_propertyDetailRepository;

    public function __construct(IPropertyRepository $repository,IPropertyTranslationRepository $translationRepository,PackageUserService $packageUserService,PropertyDetailService $propertyDetailService,IImageRepository $imageRepository,IPropertyDetailRepository $propertyDetailRepository)
    {
        $this->_propertyRepository = $repository;
        $this->_propertyTranslationRepository = $translationRepository;
        $this->_packageUserService = $packageUserService;
        $this->_propertyDetailService = $propertyDetailService;
        $this->_imageRepository = $imageRepository;
        $this->_propertyDetailRepository = $propertyDetailRepository;
    }

    public function getAll()
    {
        $this->_packageUserService->updatePackage();
        return $this->_propertyRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_propertyRepository->get($id);
    }

    public function getByUser($id)
    {
        return $this->_propertyRepository->getByUser($id);
    }

    public function add($dataProperty, $dataPropertyDetail,$imgData)
    {
        $property = $this->_propertyRepository->add($dataProperty);
        $dataProperty['propertyId'] = $property->id;
        $dataPropertyDetail['propertyId'] = $property->id;
        $property->facilities()->sync($dataProperty['facility_id']);
        $this->_propertyDetailService->add($dataPropertyDetail);
        $this->_propertyTranslationRepository->add($dataProperty);
        $this->_packageUserService->update($dataProperty['package_id']);
        $galleryImage = [];
        $galleryImage['name'] = $imgData;
        $galleryImage['image_path'] = $imgData;
        $galleryImage['property_id'] = $property['id'];
        $this->_imageRepository->add($galleryImage);
    }

    public function update($dataProperty, $dataPropertyDetail,$id)
    {
        $this->_propertyRepository->update($dataProperty,$id);
        $this->_propertyTranslationRepository->update($dataProperty);
        $this->_propertyDetailService->update($dataPropertyDetail,$id);
    }

    public function updateModerationStatus($data,$id)
    {
        $this->_propertyRepository->updateModerationStatus($data,$id);
    }
    public function delete($id)
    {
        $this->_propertyRepository->delete($id);
    }
}
