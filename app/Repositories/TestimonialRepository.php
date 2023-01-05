<?php
namespace App\Repositories;

use App\Models\Testimonial;

class TestimonialRepository implements ITestimonialRepository
{
    public function getAll()
    {
        return Testimonial::with(['testimonialTranslation','testimonialTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
    }

    public function getById($id)
    {
        return  Testimonial::find($id);
    }

    public function add($data)
    {
        return Testimonial::create($data);
    }
    public function update($data,$id)
    {

        $testimonial = $this->getById($id);
        $testimonial->update($data);
    }

    public function delete($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
    }
}