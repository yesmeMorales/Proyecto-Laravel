<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    //Property to create professions from console
    protected $fillable = ['title'];
    //Relationship a profession to many users
    public function users(){
        return $this->hasMany(User::class);
    }
}
