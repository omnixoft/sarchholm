<?php
namespace App\Services;

use App\Repositories\ITestimonialRepository;
use App\Repositories\ITestimonialTranslationRepository;

class TestimonialService
{
    private $_testimonialRepository;
    private $_testimonialTranslationRepository;

    public function __construct(ITestimonialRepository $repository,ITestimonialTranslationRepository $translationRepository)
    {
        $this->_testimonialRepository = $repository;
        $this->_testimonialTranslationRepository = $translationRepository;
    }

    public function getAll()
    {
        return $this->_testimonialRepository->getAll();
    }

    public function getById($id)
    {
        return $this->_testimonialRepository->getById($id);
    }

    public function add($data)
    {
        $testimonial = $this->_testimonialRepository->add($data);
        $data['testimonialId'] = $testimonial->id;
        $this->_testimonialTranslationRepository->add($data);
    }

    public function update($data,$id)
    {
        $this->_testimonialRepository->update($data,$id);
    }


    public function delete($id)
    {
        $this->_testimonialRepository->delete($id);
    }
}