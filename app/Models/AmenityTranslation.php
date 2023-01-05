<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmenityTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'amenity_id',
        'project_id',
        'locale',
        'name',
        'image',
        'description',
    ];
}
