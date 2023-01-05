<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function projectTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(ProjectTranslation::class,'project_id')
            ->where('locale',$locale);
    }

    public function projectTranslationEnglish()
    {
        return $this->hasOne(ProjectTranslation::class,'project_id')
            ->where('locale','en');
    }
}
