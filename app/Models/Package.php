<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','currency_id','listing','featured','package_type','order','status','is_featured','validity','is_free','credits'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function packageTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(PackageTranslation::class,'package_id')
            ->where('locale',$locale);
    }

    public function packageTranslationEnglish()
    {
        return $this->hasOne(PackageTranslation::class,'package_id')
            ->where('locale','en');
    }
}
