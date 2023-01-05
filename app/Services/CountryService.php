<?php
namespace App\Services;

use App\Repositories\ICountryRepository;
use App\Repositories\ICountryTranslationRepository;

class CountryService
{
    private $_countryRepository;
    private $_countryTranslationRepository;

    public function __construct(ICountryRepository $repository,ICountryTranslationRepository $translationRepository)
    {
        $this->_countryRepository = $repository;
        $this->_countryTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_countryRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_countryRepository->getById($id);
    }

    public function addCountry($data)
    {
        $country = $this-> _countryRepository->add($data);
        $data['countryId'] = $country->id;
        $this->_countryTranslationRepository->add($data);
    }

    public function updateCountry($data,$id)
    {
        if($data['locale'] == 'en')
        {
            $this->_countryRepository->update($data,$id);
        }
        $this->_countryTranslationRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_countryRepository->delete($id);
    }
}
