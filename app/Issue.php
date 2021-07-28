<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function Logs(){
        return $this->hasMany(Log::class);
    }
}
