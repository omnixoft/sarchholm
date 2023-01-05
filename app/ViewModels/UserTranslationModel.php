<?php
namespace App\ViewModels;

use App\Services\UserTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class UserTranslationModel implements IUserTranslationModel
{
    private $_userTranslationService;

    public function __construct(UserTranslationService $service)
    {
        $this->_userTranslationService = $service;
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
        return $this->_userTranslationService->getById($data);
    }

    public function getByLocale()
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        return $this->_userTranslationService->getByLocale($locale);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $this->_userTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['userId'] = $id;
        $data['locale'] = $request->local;
        $data['f_name'] = $request->f_name;
        $data['l_name'] = $request->l_name;
        $data['title'] = $request->title;
        $data['company_name'] = $request->company_name;
        $data['description'] = $request->description;
        $this->_userTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_userTranslationService->delete($id);
    }
}