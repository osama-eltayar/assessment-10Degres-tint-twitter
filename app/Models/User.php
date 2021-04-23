<?php

namespace App\Models;

use App\Traits\HasFiles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasFiles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'date_of_birth'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //########################################### Accessors ################################################
    public function getImageUrlAttribute()
    {
        return $this->getFileUrl($this->image) ;
    }

    //########################################### Mutators #################################################

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    //########################################### Relations ################################################

    public function followers()
    {
        return $this->belongsToMany(self::class,'user_followers','user_id','follower_id')->withTimestamps();
    }

    public function followings()
    {
        return $this->belongsToMany(self::class,'user_followers','follower_id','user_id')->withTimestamps();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }
}
