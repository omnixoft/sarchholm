<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'name',
        'location',
        'description',
        'overall_sqm',
        'locale',
        'project_link'
    ];
}
