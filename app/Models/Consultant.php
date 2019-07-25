<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    protected $guarded = ['password'];

    public function getAuthPassword()
    {
     return $this->this->password;
    }
}



