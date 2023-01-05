<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectBuildingTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'project_building_id',
        'locale',
        'payment_term_ids',
        'name',
        'capacity',
        'description',
        'code',
        'status',
    ];
}
