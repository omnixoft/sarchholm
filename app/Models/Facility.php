<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = ['name','icon','status'];

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    public function facilityTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(FacilityTranslation::class,'facility_id')
            ->where('locale',$locale);
    }

    public function facilityTranslationEnglish()
    {
        return $this->hasOne(FacilityTranslation::class,'facility_id')
            ->where('locale','en');
    }
}
