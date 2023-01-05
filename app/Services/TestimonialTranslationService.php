<?php
namespace App\Services;

use App\Repositories\ITestimonialTranslationRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class TestimonialTranslationService
{
    private $_testimonialTranslationRepository;
    public function __construct(ITestimonialTranslationRepository $repository)
    {
        $this->_testimonialTranslationRepository = $repository;
    }

    public function add($data)
    {
        $this->_testimonialTranslationRepository->add($data);
    }

    public function getById($data)
    {
        App::setLocale(Session::get('currentLocal'));

        $testimonialTranslation = $this->_testimonialTranslationRepository->getById($data);
        $data['locale'] = 'en';
        if (!isset($testimonialTranslation)) {
            $testimonialTranslation = $this->_testimonialTranslationRepository->getById($data);
        }

        return $testimonialTranslation;
    }

    public function getByLocale($locale)
    {
        $testimonialTranslation = $this->_testimonialTranslationRepository->getByLocale($locale);

        if (isset($testimonialTranslation)) {
            $testimonialTranslation = $this->_testimonialTranslationRepository->getByLocale('en');
        }
        return $testimonialTranslation;
    }

    public function update($data)
    {
        $this->_testimonialTranslationRepository->update($data);
    }

    public function delete($id)
    {
        $this->_testimonialTranslationRepository->delete($id);
    }
}