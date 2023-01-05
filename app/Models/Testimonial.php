<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','description','file','status'];

    public function testimonialTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(TestimonialTranslation::class,'testimonial_id')
            ->where('locale',$locale);
    }

    public function testimonialTranslationEnglish()
    {
        return $this->hasOne(TestimonialTranslation::class,'testimonial_id')
            ->where('locale','en');
    }
}
