<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    public function ingredients()
    {
        return $this->hasMany('App\Models\Ingredient');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }
}
