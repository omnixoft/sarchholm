<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name','order','status'];

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function countryTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(CountryTranslation::class,'country_id')
            ->where('locale',$locale);
    }

    public function countryTranslationEnglish()
    {
        return $this->hasOne(CountryTranslation::class,'country_id')
            ->where('locale','en');
    }
}
//W0jcZ6t,o2Nu
