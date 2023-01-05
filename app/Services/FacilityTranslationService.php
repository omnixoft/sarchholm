<?php
namespace App\Services;

use App\Repositories\IFacilityTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class FacilityTranslationService
{
    private $_facilityTranslationRepository;
    public function __construct(IFacilityTranslationRepository $repository)
    {
        $this->_facilityTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_facilityTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));
        $facilityTranslation = $this->_facilityTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($facilityTranslation)) {
            $facilityTranslation = $this->_facilityTranslationRepository->getById($data);
        }

        return $facilityTranslation;
    }

    public function getByLocale($locale)
    {
        $facilityTranslation = $this->_facilityTranslationRepository->getByLocale($locale);

        if (isset($facilityTranslation)) {
            $facilityTranslation = $this->_facilityTranslationRepository->getByLocale('en');
        }
        return $facilityTranslation;
    }

    public function update($data)
    {
        $this->_facilityTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_facilityTranslationRepository->delete($id);
    }
}