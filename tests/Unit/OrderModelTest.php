<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
class OrderModelTest extends TestCase
{
    // Test Order Model exists
    public function testOrderModelExists()
    {
        $this->assertTrue(class_exists('App\Models\Order'));
    }

    // Test Order Model has correct attributes
    public function testOrderModelHasCorrectAttributes()
    {
        $order = new \App\Models\Order();
        $column_names = Schema::getColumnListing($order->getTable());

        $this->assertTrue(in_array('id', $column_names));

        $this->assertTrue(in_array('order_type', $column_names));
        $this->assertTrue(in_array('paid_status', $column_names));
        $this->assertTrue(in_array('order_subtotal', $column_names));
        $this->assertTrue(in_array('order_tax', $column_names));
        $this->assertTrue(in_array('order_discount', $column_names));
        $this->assertTrue(in_array('order_discount_code', $column_names));
        $this->assertTrue(in_array('kitchen_note', $column_names));
        $this->assertTrue(in_array('delivery_note', $column_names));

        $this->assertTrue(in_array('created_at', $column_names));
        $this->assertTrue(in_array('updated_at', $column_names));
    }

    // Test attributes that can be nulled are nullable
    public function testOrderNullableAttributes()
    {
        $order = new \App\Models\Order();
        $order->order_discount = null;
        $order->order_discount_code = null;
        $order->kitchen_note = null;
        $order->delivery_note = null;

        $this->assertNull($order->order_discount);
        $this->assertNull($order->order_discount_code);
        $this->assertNull($order->kitchen_note);
        $this->assertNull($order->delivery_note);
    }

    // Test other attributes are not nullable
    public function testOrderNotNullableAttributes()
    {
        $order = new \App\Models\Order();
        $order->setOrderTypeAttribute(null);
        $order->setPaidStatus(null);
        $order->setOrderSubtotal(null);

        $this->assertNotNull($order->order_type);
        $this->assertNotNull($order->paid_status);
        $this->assertNotNull($order->order_subtotal);
    }

    // Test Order belongs to one User
    public function testOrderBelongsToOneUser()
    {
        $order = new \App\Models\Order();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\BelongsTo', $order->user());
    }

    // Test Order has many OrderItems
    public function testOrderHasManyOrderItems()
    {
        $order = new \App\Models\Order();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasMany', $order->orderItems());
    }

}
