<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'available'];

    protected $attributes = [
        'name' => '',
        'available' => true,
    ];

    // Prevent name from being null
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value ?: "";
    }

    // Prevent available from being null
    public function setAvailableAttribute($value)
    {
        if(is_null($value)) return;
        $this->attributes['available'] = $value;
    }

    public function menuItems()
    {
        return $this->belongsToMany('App\Models\MenuItem');
    }
}
