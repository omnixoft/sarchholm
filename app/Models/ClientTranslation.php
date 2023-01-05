<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'unit_id',
        'name',
        'phone',
        'link',
        'client_id',
        'locale',
        'likes'
    ];

    public function unit()
    {
        return $this->belongsTo(Inventory::class,'unit_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
}
