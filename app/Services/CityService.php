<?php
namespace App\Services;

use App\Repositories\ICityRepository;
use App\Repositories\ICityTranslationRepository;

class CityService
{
    private $_cityRepository;
    private $_cityTranslationRepository;

    public function __construct(ICityRepository $repository,ICityTranslationRepository $translationRepository)
    {
        $this->_cityRepository = $repository;
        $this->_cityTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_cityRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_cityRepository->getById($id);
    }

    public function add($data)
    {
        $city = $this-> _cityRepository->add($data);
        $data['cityId'] = $city->id;
        $this->_cityTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_cityRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_cityRepository->delete($id);
    }
}