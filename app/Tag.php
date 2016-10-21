<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function stuff()
    {
        $this->belongsToMany("App\Stuff");
    }
}
