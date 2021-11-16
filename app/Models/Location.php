<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $attributes =[
        'name' => '',
        'address' => null
    ];

    protected $fillable = [
        'name',
        'address',
    ];

    public function setNameAttribute($value)
    {
        if(is_null($value)) return;
        $this->attributes['name'] = ucwords($value);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
