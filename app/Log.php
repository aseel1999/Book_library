<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function Issue(){
        return $this->belongsTo(Issue::class);
    }
}
