<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Consultant extends Model
{
    protected $guarded = ['password'];
    protected $table='consultants';
 
    public function getAuthPassword()
    {
        return $this->this->password;
    }
    public function administrador()
    {
        return $this->hasOne('App\Models\Administrador');
    }
}

