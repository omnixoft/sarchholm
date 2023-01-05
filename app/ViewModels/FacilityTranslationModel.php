<?php
namespace App\ViewModels;

use App\Services\FacilityTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class FacilityTranslationModel implements IFacilityTranslationModel
{
    private $_facilityTranslationService;

    public function __construct(FacilityTranslationService $service)
    {
        $this->_facilityTranslationService = $service;
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
        return $this->_facilityTranslationService->getById($data);
    }

    public function getByLocale()
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        return $this->_facilityTranslationService->getByLocale($locale);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $this->_facilityTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['facilityId'] = $id;
        $data['name'] = $request->name;
        $data['locale'] = $request->local;
        $this->_facilityTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_facilityTranslationService->delete($id);
    }
}