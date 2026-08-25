<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
use HasApiTokens,Notifiable,HasFactory;

    protected $guarded = []; 
    protected $table = 'users';

    public function Profile(){
       return  $this->hasOne(Profile::class);
    }
 public function tasks(){
       return  $this->hasMany(Task::class);
    }

}
