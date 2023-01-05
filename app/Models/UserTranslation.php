<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'locale',
        'f_name',
        'l_name',
        'title',
        'company_name',
        'description',
    ];
}
