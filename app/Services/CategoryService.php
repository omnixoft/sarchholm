<?php
namespace App\Services;

use App\Repositories\ICategoryRepository;
use App\Repositories\ICategoryTranslationRepository;
use Illuminate\Support\Facades\Session;

class CategoryService
{
    private $_categoryRepository;
    private $_categoryTranslationRepository;

    public function __construct(ICategoryRepository $repository,ICategoryTranslationRepository $translationRepository)
    {
        $this->_categoryRepository = $repository;
        $this->_categoryTranslationRepository = $translationRepository;
    }

    public function getAllCategory()
    {
       return $this->_categoryRepository->getAllCategory();
    }

    public function addCategory($data)
    {
        $locale = Session::get('currentLocal');
        $category =  $this->_categoryRepository->add($data);
        $data['categoryId'] = $category->id;
        $data['locale'] = $locale;
        $this->_categoryTranslationRepository->add($data);
    }

    public function updateCategory($data,$id)
    {
        $this->_categoryRepository->update($data,$id);
    }

    public function getById($id)
    {
        return $this->_categoryRepository->getCategoryById($id);
    }
    public function delete($id)
    {
        $this->_categoryRepository->delete($id);
    }
}