<?php
namespace App\Repositories;

use App\Models\TestimonialTranslation;

class TestimonialTranslationRepository implements ITestimonialTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return TestimonialTranslation::where('testimonial_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {

    }

    public function add($data)
    {
        TestimonialTranslation::create([
            'testimonial_id'=> $data['testimonialId'],
            'locale'=> $data['locale'],
            'name'=>$data['name'],
            'address'=>$data['address'],
            'description'=>$data['description'],
        ]);
    }

    public function update($data)
    {
        TestimonialTranslation::updateOrCreate(
            [
                'testimonial_id' => $data['testimonialId'],
                'locale'    =>  $data['locale'],
            ], //condition
            [
                'name' => $data['name'],
                'address' => $data['address'],
                'description' => $data['description'],
            ]
        );
    }

    public function delete($id)
    {
        TestimonialTranslation::where('testimonial_id',$id)->delete();
    }
}