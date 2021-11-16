<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory;

    protected $attributes = [
        'order_type' => 'store',
        'paid_status' => 'unpaid',
        'order_subtotal' => 0,
    ];

    protected $notNullable = [
        'order_type',
        'paid_status',
        'order_subtotal',
    ];

    public function setOrderTypeAttribute($value)
    {
        $this->setNonNullValue($value, 'order_type');
    }
    public function setPaidStatusAttribute($value){
        $this->setNonNullValue($value, 'paid_status');

    }
    public function setOrderSubtotalAttribute($value){
        $this->setNonNullValue($value, 'order_subtotal');
    }


    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function orderItems(){
        return $this->hasMany('App\Models\OrderItem');
    }

    private function setNonNullValue($value, $attribute_name){
        $original = $this->attributes[$attribute_name];

        if(is_null($value)) $this->attributes[$attribute_name] = $original;
        else $this->attributes[$attribute_name] = $value;
    }

}
