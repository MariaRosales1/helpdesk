<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{

    protected $guarded = [];

    public function consultant()
    {
        return $this->belongsTo('App\Models\Consultant');
    }
}
