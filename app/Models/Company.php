<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['nit', 'name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
