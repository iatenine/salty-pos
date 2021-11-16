<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $visible =[
        'name'
    ];

    protected $fillable = [
        'name',
        'address',
    ];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value) ?: "";
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
