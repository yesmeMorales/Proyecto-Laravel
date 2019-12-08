<?php

namespace App;

use App\Models\Profession;
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
        'is_admin' => 'boolean'
    ];

    public static function findByEmail($email){
        return User::where(compact('email'))->first(); 
    }

    //User relationship to Profession
    public function profession(){
        return $this->belongsTo(Profession::class);
    }

    //Function to compare the administrator's email and know what the admin is
    public function isAdmin(){
        return $this->is_admin;
    }

}
