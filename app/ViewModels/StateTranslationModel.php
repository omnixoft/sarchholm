<?php
namespace App\ViewModels;

use App\Services\StateTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class StateTranslationModel implements IStateTranslationModel
{
    private $_stateTranslationService;

    public function __construct(StateTranslationService $service)
    {
        $this->_stateTranslationService = $service;
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
        return $this->_stateTranslationService->getById($data);
    }

    public function getByLocale()
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        return $this->_stateTranslationService->getByLocale($locale);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $this->_stateTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['stateId'] = $id;
        $data['name'] = $request->name;
        $data['locale'] = $request->local;
        $this->_stateTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_stateTranslationService->delete($id);
    }
}