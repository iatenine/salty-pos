<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;

class OrderItem extends TestCase
{
    // Test OrderItem Model exists
    public function test_order_item_model_exists()
    {
        $this->assertTrue(class_exists('App\Models\OrderItem'));
    }

    // Test OrderItem Model has attributes
    public function test_order_item_model_has_attributes()
    {
        $orderItem = new \App\Models\OrderItem();
        $column_names = Schema::getColumnListing($orderItem->getTable());

        $this->assertTrue(in_array('id', $column_names));
        $this->assertTrue(in_array('order_id', $column_names));
        $this->assertTrue(in_array('created_at', $column_names));
        $this->assertTrue(in_array('updated_at', $column_names));
    }

    // Test OrderItem Model has one menu item
    public function testOrderItemHasOneMenuItem()
    {
        $orderItem = new \App\Models\OrderItem();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\BelongsTo', $orderItem->menuItem());
    }

    // Test OrderItem has many Ingredients through Additions
    public function testOrderItemHasManyIngredientsThroughAdditions()
    {
        $orderItem = new \App\Models\OrderItem();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasMany', $orderItem->additions()->first()->ingredients());
    }

    // Test OrderItem has many Ingredients through Subtractions
    public function testOrderItemHasManyIngredientsThroughSubtractions()
    {
        $orderItem = new \App\Models\OrderItem();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasMany', $orderItem->subtractions()->first()->ingredients());
    }
}
