<?php
namespace App\ViewModels;

use App\Services\CategoryService;
use App\Services\CategoryTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CategoryTranslationModel implements ICategoryTranslationModel
{
    private $_categoryService;
    private $_categoryTranslationService;

    public function __construct(CategoryService $service,CategoryTranslationService $categoryTranslationService)
    {
        $this->_categoryService = $service;
        $this->_categoryTranslationService = $categoryTranslationService;
    }


    public function getAll(Request $request)
    {
        // TODO: Implement getAll() method.
    }
    public function getByLocale()
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        return $this->_categoryTranslationService->getByLocale($locale);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
    }

    public function getById($id)
    {
       return $this->_categoryTranslationService->getById($id);
    }

    public function update(Request $request, $id)
    {

        $data['categoryId'] = $id;
        $data['name'] = $request->name;
        $data['locale'] = $request->local;

        $this->_categoryTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_categoryTranslationService->delete($id);
    }
}