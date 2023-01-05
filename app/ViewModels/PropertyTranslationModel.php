<?php
namespace App\ViewModels;

use App\Services\CityTranslationService;
use App\Services\PropertyTranslationService;
use App\Services\StateTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PropertyTranslationModel implements IPropertyTranslationModel
{
    private $_propertyTranslationService;

    public function __construct(PropertyTranslationService $service)
    {
        $this->_propertyTranslationService = $service;
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
        return $this->_propertyTranslationService->getById($data);
    }
    public function getByLocale()
    {
        // TODO: Implement getByLocale() method.
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $this->_propertyTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['propertyId'] = $id;
        $data['title'] = $request->title;
        $data['locale'] = $request->local;
        $data['description'] = $request->description;
        $this->_propertyTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_propertyTranslationService->delete($id);
    }
}