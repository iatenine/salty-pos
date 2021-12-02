<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;

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
        $columnNames = Schema::getColumnListing('order_items');

        $this->assertTrue(in_array('id', $columnNames));
        $this->assertTrue(in_array('created_at', $columnNames));
        $this->assertTrue(in_array('updated_at', $columnNames));
    }

    // Test Order Item has one menu item
    public function testOrderItemHasOneMenuItem()
    {
        $orderItem = new \App\Models\OrderItem();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\BelongsTo', $orderItem->menuItem());
    }

    

    // TODO: Add through tests for Additions and Subtractions
    public function testTodoNotComplete(){
        $this->assertTrue(true);
    }
}
