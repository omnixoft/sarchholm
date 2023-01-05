<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'f_name',
        'l_name',
        'username',
        'type',
        'is_approved',
        'email',
        'mobile',
        'title',
        'company_name',
        'image',
        'description',
        'skype',
        'password',
        'fb',
        'twitter',
        'instagram',
        'status',
        'mobile_office'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function credits()
    {
        return $this->hasMany(Credit::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class)->withPivot('package_id','is_expired','active_at','expire_at','price','item','status');
    }

    public function packageUser()
    {
        return $this->hasMany(PackageUser::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function userTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(UserTranslation::class,'user_id')
            ->where('locale',$locale);
    }

    public function userTranslationEnglish()
    {
        return $this->hasOne(UserTranslation::class,'user_id')
            ->where('locale','en');
    }

    public function photo()
    {

        if (file_exists( public_path() . '/images/users/'.$this->image)) {
            return 'images/users/'.$this->image;
        } else {
            return 'images/agents/agent_1.jpg';
        }
    }
}
