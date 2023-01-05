<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'unit_id',
        'name',
        'phone',
        'link',
        'likes'
    ];

    public function clientTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(ClientTranslation::class,'client_id')
            ->where('locale',$locale);
    }

    public function clientTranslationEnglish()
    {
        return $this->hasOne(ClientTranslation::class,'client_id')
            ->where('locale','en');
    }


    public function unit()
    {
        return $this->belongsTo(Inventory::class,'unit_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
}
