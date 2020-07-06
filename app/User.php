<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function post(){

    //     //one to one
    //     return $this->hasOne('App\Post'/* , foreign key, primary or local key */);

    // }

    public function posts(){

        // one to many
        return $this->hasMany('App\Post');
        
    }

    public function roles(){

        // many to many
        return $this->belongsToMany('App\Role')->withPivot('created_at','updated_at');

    }

    public function photos(){

        // polymorphic
        return $this->morphMany('App\Photo', 'imageable');
        
    }


    // Accessor gets data
    public function getNameAttribute($value){

        return strtoupper($value);

    }

    // Mutator sets data
    public function setNameAttribute($value){

        $this->attributes['name']=strtoupper($value);

    }
}
