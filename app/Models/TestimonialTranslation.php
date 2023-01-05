<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialTranslation extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'testimonial_id',
            'name',
            'locale',
            'address',
            'description',
        ];
}
