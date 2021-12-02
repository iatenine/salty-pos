<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;

class SubtractionsModel extends TestCase
{
    // Test Subtractions Model exists
    public function testSubtractionsModelExists()
    {
        $this->assertTrue(class_exists('App\Models\Subtractions'));
    }

    // Test Subtractions Model has the correct table name
    public function testSubtractionsModelHasCorrectTableName()
    {
        $this->assertTrue(Schema::hasTable('subtractions'));
    }

    // Test Subtractions Table has the correct columns
    public function testSubtractionsTableHasCorrectColumns()
    {
        $this->assertTrue(Schema::hasColumn('subtractions', 'id'));
        $this->assertTrue(Schema::hasColumn('subtractions', 'subtraction_id'));
        $this->assertTrue(Schema::hasColumn('subtractions', 'order_item_id'));
        $this->assertTrue(Schema::hasColumn('subtractions', 'created_at'));
        $this->assertTrue(Schema::hasColumn('subtractions', 'updated_at'));
    }
}
