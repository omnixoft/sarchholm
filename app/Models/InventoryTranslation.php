<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'building_id',
        'project_id',
        'inventory_id',
        'locale',
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
}
