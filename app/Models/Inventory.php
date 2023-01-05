<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'building_id',
        'project_id',
        'name',
        'sqm',
        'price',
        'discount_price',
        'image',
        'description',
        'material',
        'available'
    ];

    public function building()
    {
        return $this->belongsTo(ProjectBuilding::class,'building_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
    public function inventoryTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(InventoryTranslation::class,'inventory_id')
            ->where('locale',$locale);
    }

    public function inventoryTranslationEnglish()
    {
        return $this->hasOne(InventoryTranslation::class,'inventory_id')
            ->where('locale','en');
    }
}
