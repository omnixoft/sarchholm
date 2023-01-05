<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDetailTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'propertyDetail_id',
        'locale',
        'content'
    ];
}
