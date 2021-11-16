<?php

namespace Tests\Unit;

use Tests\TestCase;

class OrderItemModelTest extends TestCase
{
    // Test Order Item Model exists
    public function testOrderItemModelExists()
    {
        $this->assertTrue(class_exists('App\Models\OrderItem'));
    }

    // Test Order Item Model has attributes
    public function testOrderItemModelHasAttributes()
    {
        $orderItem = new \App\Models\OrderItem();
        $this->assertObjectHasAttribute('id', $orderItem);
        $this->assertObjectHasAttribute('created_at', $orderItem);
        $this->assertObjectHasAttribute('updated_at', $orderItem);
    }

    // Test Order Item has one menu item
    public function testOrderItemHasOneMenuItem()
    {
        $orderItem = new \App\Models\OrderItem();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\BelongsTo', $orderItem->menuItem());
    }

    // TODO: Add through tests for Additions and Subtractions
    public function testTodoNotComplete(){
        $this->assertTrue(false);
    }
}
