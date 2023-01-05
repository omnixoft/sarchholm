<?php
namespace App\ViewModels;

use App\Services\PackageTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PackageTranslationModel implements IPackageTranslationModel
{
    private $_packageTranslationService;

    public function __construct(PackageTranslationService $service)
    {
        $this->_packageTranslationService = $service;
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
        return $this->_packageTranslationService->getById($data);
    }

    public function getByLocale()
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        return $this->_packageTranslationService->getByLocale($locale);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $this->_packageTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['packageId'] = $id;
        $data['name'] = $request->name;
        $data['locale'] = $request->local;
        $this->_packageTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_packageTranslationService->delete($id);
    }
}