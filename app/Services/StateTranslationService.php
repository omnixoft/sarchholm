<?php
namespace App\Services;

use App\Repositories\IStateTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class StateTranslationService
{
    private $_stateTranslationRepository;
    public function __construct(IStateTranslationRepository $repository)
    {
        $this->_stateTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_stateTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $stateTranslation = $this->_stateTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($stateTranslation)) {
            $stateTranslation = $this->_stateTranslationRepository->getById($data);
        }

        return $stateTranslation;
    }

    public function getByLocale($locale)
    {
        $stateTranslation = $this->_stateTranslationRepository->getByLocale($locale);

        if (isset($stateTranslation)) {
            $stateTranslation = $this->_stateTranslationRepository->getByLocale('en');
        }
        return $stateTranslation;
    }

    public function update($data)
    {
        $this->_stateTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_stateTranslationRepository->delete($id);
    }
}