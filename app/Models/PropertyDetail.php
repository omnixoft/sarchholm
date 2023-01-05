<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class PropertyDetail extends Model
{
    use HasFactory;
    protected $table = 'property_details';
    protected $fillable = [
        'property_id',
        'bed',
        'bath',
        'garage',
        'floor',
        'room_size',
        'content',
        'video'
        ];

    public function propertyDetailTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(PropertyDetailTranslation::class,'propertyDetail_id')
            ->where('locale',$locale);
    }

    public function propertyDetailTranslationEnglish()
    {
        return $this->hasOne(PropertyDetailTranslation::class,'propertyDetail_id')
            ->where('locale','EN');
    }
}
