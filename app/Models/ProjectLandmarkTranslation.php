<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLandmarkTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'landmark_id',
        'project_id',
        'locale',
        'name',
        'map_location',
        'location_minutes',
        'location_image',
    ];
}
