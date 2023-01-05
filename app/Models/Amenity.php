<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Amenity extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'name',
        'image',
        'description',
    ];

    public function amenityTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(AmenityTranslation::class,'amenity_id')
            ->where('locale',$locale);
    }

    public function amenityTranslationEnglish()
    {
        return $this->hasOne(AmenityTranslation::class,'amenity_id')
            ->where('locale','EN');
    }
}
