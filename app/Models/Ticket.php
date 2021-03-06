<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];

    protected $fillable = ['score', 'comment'];

    public function consultant()
    {
        return $this->belongsTo('App\Models\Consultant');
    }
}
