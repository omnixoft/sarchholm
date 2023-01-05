<?php
namespace App\Services;

use App\Repositories\ICategoryRepository;
use App\Repositories\ICategoryTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CategoryTranslationService
{
    private $_categoryTranslationRepository;
    private $_categoryRepository;
    public function __construct(ICategoryTranslationRepository $repository,ICategoryRepository $categoryRepository)
    {
        $this->_categoryTranslationRepository = $repository;
        $this->_categoryRepository = $categoryRepository;
    }

    public function getById($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['id'] = $id;
        $categoryTranslation = $this->_categoryTranslationRepository->getCategoryTranslationById($data);
        $data['locale'] = 'en';
        if (!isset($categoryTranslation)) {
            $categoryTranslation = $this->_categoryTranslationRepository->getCategoryTranslationById($data);
        }
        return $categoryTranslation;
    }

    public function getByLocale($locale)
    {
        $categoryTranslation = $this->_categoryTranslationRepository->getByLocale($locale);

        if (isset($categoryTranslation)) {
            $categoryTranslation = $this->_categoryTranslationRepository->getByLocale('en');
        }
        return $categoryTranslation;
    }

    public function update($data)
    {
        $this->_categoryTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_categoryTranslationRepository->delete($id);
    }

}