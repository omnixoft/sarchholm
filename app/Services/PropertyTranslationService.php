<?php
namespace App\Services;

use App\Repositories\ICityTranslationRepository;
use App\Repositories\IPropertyTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PropertyTranslationService
{
    private $_propertyTranslationRepository;
    public function __construct(IPropertyTranslationRepository $repository)
    {
        $this->_propertyTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_propertyTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $propertyTranslation = $this->_propertyTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($propertyTranslation)) {
            $propertyTranslation = $this->_propertyTranslationRepository->getById($data);
        }

        return $propertyTranslation;
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