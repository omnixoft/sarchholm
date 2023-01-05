<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','parent_id','order','status','is_default','description'];

    public function parentCategory()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class)->where('moderation_status',1);
    }

    public function categoryTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(CategoryTranslation::class,'category_id')
            ->where('locale',$locale);
    }

    public function categoryTranslationEnglish()
    {
        return $this->hasOne(CategoryTranslation::class,'category_id')
            ->where('locale','en');
    }
}
