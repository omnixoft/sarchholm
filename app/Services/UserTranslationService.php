<?php
namespace App\Services;

use App\Repositories\IUserTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class UserTranslationService
{
    private $_userTranslationRepository;
    public function __construct(IUserTranslationRepository $repository)
    {
        $this->_userTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_userTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $userTranslation = $this->_userTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($userTranslation)) {
            $userTranslation = $this->_userTranslationRepository->getById($data);
        }

        return $userTranslation;
    }

    public function getByLocale($locale)
    {
        $userTranslation = $this->_userTranslationRepository->getByLocale($locale);

        if (isset($userTranslation)) {
            $userTranslation = $this->_userTranslationRepository->getByLocale('en');
        }
        return $userTranslation;
    }

    public function update($data)
    {
        $this->_userTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_userTranslationRepository->delete($id);
    }
}