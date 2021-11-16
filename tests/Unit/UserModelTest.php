<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

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
        $column_names = Schema::getColumnListing($user->getTable());



        $this->assertTrue(in_array('id', $column_names));
        $this->assertTrue(in_array('name', $column_names));
        $this->assertTrue(in_array('email', $column_names));
        $this->assertTrue(in_array('password', $column_names));
        $this->assertTrue(in_array('remember_token', $column_names));
        $this->assertTrue(in_array('number', $column_names));
        $this->assertTrue(in_array('default_kitchen_note', $column_names));
        $this->assertTrue(in_array('default_delivery_note', $column_names));
        $this->assertTrue(in_array('address', $column_names));
        $this->assertTrue(in_array('auth_level', $column_names));
        $this->assertTrue(in_array('internal_notes', $column_names));
        $this->assertTrue(in_array('created_at', $column_names));
        $this->assertTrue(in_array('updated_at', $column_names));
    }

    // Test password is hashed
    public function testUserPasswordIsHashed()
    {
        $user = new \App\Models\User();
        $user->password = 'password';
        $user->save();

        $this->assertTrue(Hash::check('password', $user->password));
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
