<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDetailTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'unit_id',
        'project_id',
        // 'like',
        'duration_per_visit',
        'request_for_call',
        'client_detail_id',
        'locale'
    ];

    public function unit()
    {
        return $this->belongsTo(Inventory::class, 'unit_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
