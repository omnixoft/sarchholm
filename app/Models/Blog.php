<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'image',
        'body',
        'status'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);

    }



    public function blogTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(BlogTranslation::class,'blog_id')
            ->where('locale',$locale);
    }

    public function blogTranslationEnglish()
    {
        return $this->hasOne(BlogTranslation::class,'blog_id')
            ->where('locale','en');
    }
}
