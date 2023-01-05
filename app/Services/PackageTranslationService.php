<?php
namespace App\Services;

use App\Repositories\IPackageTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PackageTranslationService
{
    private $_packageTranslationRepository;
    public function __construct(IPackageTranslationRepository $repository)
    {
        $this->_packageTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_packageTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $packageTranslation = $this->_packageTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($packageTranslation)) {
            $packageTranslation = $this->_packageTranslationRepository->getById($data);
        }

        return $packageTranslation;
    }

    public function getByLocale($locale)
    {
        $stateTranslation = $this->_packageTranslationRepository->getByLocale($locale);

        if (isset($stateTranslation)) {
            $stateTranslation = $this->_packageTranslationRepository->getByLocale('en');
        }
        return $stateTranslation;
    }

    public function update($data)
    {
        $this->_packageTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_packageTranslationRepository->delete($id);
    }
}