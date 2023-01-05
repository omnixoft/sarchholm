<?php
namespace App\Services;

use App\Repositories\ICountryTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CountryTranslationService
{
    private $_countryTranslationRepository;
    public function __construct(ICountryTranslationRepository $repository)
    {
        $this->_countryTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_countryTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $countryTranslation = $this->_countryTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($countryTranslation)) {
            $countryTranslation = $this->_countryTranslationRepository->getById($data);
        }

        return $countryTranslation;
    }

    public function getByLocale($locale)
    {
        $countryTranslation = $this->_countryTranslationRepository->getByLocale($locale);

        if (isset($countryTranslation)) {
            $countryTranslation = $this->_countryTranslationRepository->getByLocale('en');
        }
        return $countryTranslation;
    }

    public function update($data)
    {
        $this->_countryTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_countryTranslationRepository->delete($id);
    }
}