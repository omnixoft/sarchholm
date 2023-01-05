<?php
namespace App\ViewModels;

use App\Services\CityTranslationService;
use App\Services\StateTranslationService;
use App\Services\TestimonialTranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class TestimonialTranslationModel implements ITestimonialTranslationModel
{
    private $_testimonialTranslationService;

    public function __construct(TestimonialTranslationService $service)
    {
        $this->_testimonialTranslationService = $service;
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
        return $this->_testimonialTranslationService->getById($data);
    }

    public function add(Request $request)
    {
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $data['name'] = $request->name;
        $this->_testimonialTranslationService->add($data);

    }

    public function update(Request $request, $id)
    {
        $data['testimonialId'] = $id;
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['description'] = $request->description;
        $data['locale'] = $request->local;
        $this->_testimonialTranslationService->update($data);
    }

    public function delete($id)
    {
        $this->_testimonialTranslationService->delete($id);
    }
}