<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Set default attributes
    protected $attributes = [
        'name' => '',
    ];

    public function setNameAttribute($value)
    {
        if(is_null($value)) return;
        $this->attributes['name'] = $value;
    }

    public function menuItems()
    {
        return $this->hasMany('App\Models\MenuItem');
    }

    public function location(){
        return $this->belongsTo('App\Models\Location');
    }
}
