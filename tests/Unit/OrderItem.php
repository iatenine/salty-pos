<?php

namespace Tests\Unit;

use Tests\TestCase;

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
        $this->assertObjectHasAttribute('id', $orderItem);
        $this->assertObjectHasAttribute('order_id', $orderItem);
        $this->assertObjectHasAttribute('additions', $orderItem);
        $this->assertObjectHasAttribute('subtractions', $orderItem);
        $this->assertObjectHasAttribute('quantity', $orderItem);
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
