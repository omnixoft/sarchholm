<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name','state_id','country_id','order','status','slug','image'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function properties()
    {
       return $this->hasMany(Property::class,'city_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function cityTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(CityTranslation::class,'city_id')
            ->where('locale',$locale);
    }

    public function cityTranslationEnglish()
    {
        return $this->hasOne(CityTranslation::class,'city_id')
            ->where('locale','en');
    }
}
