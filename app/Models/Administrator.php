<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
