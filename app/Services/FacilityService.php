<?php
namespace App\Services;

use App\Repositories\IFacilityRepository;
use App\Repositories\IFacilityTranslationRepository;

class FacilityService
{
    private $_facilityRepository;
    private $_facilityTranslationRepository;

    public function __construct(IFacilityRepository $repository,IFacilityTranslationRepository $translationRepository)
    {
        $this->_facilityRepository = $repository;
        $this->_facilityTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_facilityRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_facilityRepository->getById($id);
    }

    public function add($data)
    {
        $facility = $this->_facilityRepository->add($data);
        $data['facilityId'] = $facility->id;
        $this->_facilityTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_facilityRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_facilityRepository->delete($id);
    }
}