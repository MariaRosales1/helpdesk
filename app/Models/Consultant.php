<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Consultant extends Model
{
    protected $guarded = ['password'];
 
    public function getAuthPassword()
    {
        return $this->this->password;
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

