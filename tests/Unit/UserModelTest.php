<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserModelTest extends TestCase
{
    // Test that User model exists
    public function testUserModelExists()
    {
        $this->assertTrue(class_exists('App\Models\User'));
    }

    // Test that User has expected attributes
    public function testUserHasAttributes()
    {
        $user = new \App\Models\User();

        $this->assertObjectHasAttribute('id', $user);
        $this->assertObjectHasAttribute('name', $user);
        $this->assertObjectHasAttribute('email', $user);
        $this->assertObjectHasAttribute('password', $user);
        $this->assertObjectHasAttribute('remember_token', $user);
        $this->assertObjectHasAttribute('number', $user);
        $this->assertObjectHasAttribute('default_kitchen_note', $user);
        $this->assertObjectHasAttribute('default_delivery_note', $user);
        $this->assertObjectHasAttribute('address', $user);
        $this->assertObjectHasAttribute('auth_level', $user);
        $this->assertObjectHasAttribute('internal_notes', $user);
        $this->assertObjectHasAttribute('created_at', $user);
        $this->assertObjectHasAttribute('updated_at', $user);
    }

    // Test that number and address are nullable
    public function testNumberAndAddressAreNullable()
    {
        $user = new \App\Models\User();

        $this->assertTrue($user->number === null);
        $this->assertTrue($user->address === null);
    }

    // Test that User has many Orders
    public function testUserHasManyOrders()
    {
        $user = new \App\Models\User();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasMany', $user->orders);
    }

    // Test auth level is an integer
    public function testAuthLevelIsAnInteger()
    {
        $user = new \App\Models\User();
        // Check that auth_level is an integer
        $auth_level = $user->getAttributes()['auth_level'];
        $this->assertTrue(is_int($auth_level));
    }
}
