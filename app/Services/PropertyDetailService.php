<?php
namespace App\Services;

use App\Repositories\IPropertyDetailRepository;
use App\Repositories\IPropertyDetailTranslationRepository;

class PropertyDetailService
{
    private $_propertyDetailRepository;
    private $_propertyDetailTranslationRepository;

    public function __construct(IPropertyDetailRepository $repository,IPropertyDetailTranslationRepository $translation)
    {
        $this->_propertyDetailRepository = $repository;
        $this->_propertyDetailTranslationRepository = $translation;
    }

    public function add($data)
    {
        $propertyDetail = $this->_propertyDetailRepository->add($data);
        $data['propertyDetailId'] = $propertyDetail->id;
        $this->_propertyDetailTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
       $propertyDetail =  $this->_propertyDetailRepository->getByPropertyId($id);
       $data['propertyDetailId'] =$propertyDetail['id'];
       $this->_propertyDetailRepository->update($data,$id);
       $this->_propertyDetailTranslationRepository->update($data);
    }
}