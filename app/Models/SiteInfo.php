<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'logo',
        'favicon',
        'email',
        'phone',
        'description',
        'address',
        'copy_right',
        'fb',
        'twitter',
        'yt',
        'pinterest',
        'terms_condition',
        'privacy_policy',
        'color',
        'about_us'
    ];
}
