<?php
namespace App\ViewModels;

use App\Services\CountryTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CountryTranslationModel implements ICountryTranslationModel
{
    private $_countryTranslationService;

    public function __construct(CountryTranslationService $service)
    {
        $this->_countryTranslationService = $service;
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
        return $this->_countryTranslationService->getById($data);
    }

    public function getByLocale()
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        return $this->_countryTranslationService->getByLocale($locale);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $this->_countryTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['countryId'] = $id;
        $data['name'] = $request->name;
        $data['locale'] = $request->local;
        $this->_countryTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_countryTranslationService->delete($id);
    }
}