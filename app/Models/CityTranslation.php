<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['city_id','locale','name'];
    public function city()
    {
        return $this->hasOne(City::class);
    }
}
