<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Property extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'user_id',
        'package_id',
        'title',
        'type',
        'category_id',
        'country_id',
        'state_id',
        'city_id',
        'lat',
        'lon',
        'price',
        'currency_id',
        'status',
        'is_featured',
        'property_id',
        'moderation_status',
        'description',
        'thumbnail',
        'background_image',
    ];

    public function propertyDetails()
    {
        return $this->hasOne(PropertyDetail::class,'property_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function package()
    {
        return $this->belongsTo(PackageUser::class,'package_id');
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function propertyTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(PropertyTranslation::class,'property_id')
            ->where('locale',$locale);
    }

    public function propertyTranslationEnglish()
    {
        return $this->hasOne(PropertyTranslation::class,'property_id')
            ->where('locale','en');
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class)->withPivot('facility_id');
    }

    public function photo()
    {

        if (file_exists( public_path() . '/images/thumbnail/'.$this->thumbnail)) {
            return 'images/thumbnail/'.$this->thumbnail;
        } else {
            return 'images/property/property_1.jpg';
        }
    }
}
