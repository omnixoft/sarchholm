<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id','name','order','status'];

    public function blogs()
    {
        return $this->hasMany(Blog::class,'category_id');
    }

    public function parent()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function blogCategoryTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(BlogCategoryTranslation::class,'category_id')
            ->where('locale',$locale);
    }

    public function blogCategoryTranslationEnglish()
    {
        return $this->hasOne(BlogCategoryTranslation::class,'category_id')
            ->where('locale','EN');
    }
}
