<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class ProjectLandmark extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'name',
        'map_location',
        'location_minutes',
        'location_image'
    ];

    public function projectLandmarkTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(ProjectLandmarkTranslation::class,'landmark_id')
            ->where('locale',$locale);
    }

    public function projectLandmarkTranslationEnglish()
    {
        return $this->hasOne(ProjectLandmarkTranslation::class,'landmark_id')
            ->where('locale','en');
    }

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }

}
