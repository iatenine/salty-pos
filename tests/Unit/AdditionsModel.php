<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;

class AdditionsModel extends TestCase
{
    // Test Additions Model exists
    public function testAdditionsModelExists()
    {
        $this->assertTrue(class_exists('App\Models\Additions'));
    }

    // Test Additions Model has the correct table name
    public function testAdditionsModelHasCorrectTableName()
    {
        $this->assertTrue(Schema::hasTable('additions'));
    }

    // Test Additions Model has attributes
    public function testAdditionsModelHasAttributes()
    {
        $addition = Schema::getColumnListing('additions');
        $this->assertTrue(in_array('id', $addition));
        $this->assertTrue(in_array('addition_id', $addition));
        $this->assertTrue(in_array('order_item_id', $addition));
        $this->assertTrue(in_array('created_at', $addition));
        $this->assertTrue(in_array('updated_at', $addition));

    }

    public function testAdditionsModelHasRelationships()
    {
        $this->assertTrue(false);
    }
}
