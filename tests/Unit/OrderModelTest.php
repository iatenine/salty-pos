<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

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

        $this->assertObjectHasAttribute('id', $order);
        $this->assertObjectHasAttribute('order_type', $order);
        $this->assertObjectHasAttribute('paid_status', $order);
        $this->assertObjectHasAttribute('order_total', $order);
        $this->assertObjectHasAttribute('order_tax', $order);
        $this->assertObjectHasAttribute('order_discount', $order);
        $this->assertObjectHasAttribute('order_discount_code', $order);
        $this->assertObjectHasAttribute('kitchen_note', $order);
        $this->assertObjectHasAttribute('delivery_note', $order);
        $this->assertObjectHasAttribute('created_at', $order);
        $this->assertObjectHasAttribute('updated_at', $order);
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
        $order->order_type = null;
        $order->paid_status = null;
        $order->order_total = null;

        $this->assertNotNull($order->order_type);
        $this->assertNotNull($order->paid_status);
        $this->assertNotNull($order->order_total);
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
