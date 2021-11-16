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

    // Prevent name from being assigned null
    public function setNameAttribute($value)
    {
        if(is_null($value)) {
            $this->attributes['name'] = '';
        } else {
            $this->attributes['name'] = $value;
        }
    }
}
