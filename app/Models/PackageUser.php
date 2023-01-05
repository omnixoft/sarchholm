<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageUser extends Model
{
    use HasFactory;
    protected $table = 'package_user';

    protected $fillable = ['user_id','package_id','property_id','is_expired','active_at','expire_at','price','item','status'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
