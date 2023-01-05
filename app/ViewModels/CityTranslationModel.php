<?php
namespace App\ViewModels;

use App\Services\CityTranslationService;
use App\Services\StateTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CityTranslationModel implements ICityTranslationModel
{
    private $_cityTranslationService;

    public function __construct(CityTranslationService $service)
    {
        $this->_cityTranslationService = $service;
    }

    public function getAll(Request $request)
    {
        // TODO: Implement getAll() method.
    }

    public function getById($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');

        $data['locale'] = $locale;
        $data['id'] = $id;
        return $this->_cityTranslationService->getById($data);
    }

    public function getByLocale()
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        return $this->_cityTranslationService->getByLocale($locale);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $this->_cityTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['cityId'] = $id;
        $data['name'] = $request->name;
        $data['locale'] = $request->local;
        $this->_cityTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_cityTranslationService->delete($id);
    }
}