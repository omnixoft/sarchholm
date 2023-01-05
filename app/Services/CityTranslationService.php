<?php
namespace App\Services;

use App\Repositories\ICityTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CityTranslationService
{
    private $_cityTranslationRepository;
    public function __construct(ICityTranslationRepository $repository)
    {
        $this->_cityTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_cityTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $cityTranslation = $this->_cityTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($stateTranslation)) {
            $cityTranslation = $this->_cityTranslationRepository->getById($data);
        }
        return $cityTranslation;
    }

    public function getByLocale($locale)
    {
        $cityTranslation = $this->_cityTranslationRepository->getByLocale($locale);

        if (isset($cityTranslation)) {
            $cityTranslation = $this->_cityTranslationRepository->getByLocale('en');
        }
        return $cityTranslation;
    }
    public function update($data)
    {
        $this->_cityTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_cityTranslationRepository->delete($id);
    }
}