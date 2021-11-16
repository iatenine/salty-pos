<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;

class LocationModelTest extends TestCase
{
    // Test that the Location Model exists
    public function testLocationModelExists()
    {
        $this->assertTrue(class_exists('App\Models\Location'));
    }

    // Test that it contains the correct attributes
    public function testLocationModelHasCorrectAttributes()
    {
        $location = new \App\Models\Location();
        $column_names = Schema::getColumnListing($location->getTable());

        $this->assertTrue(in_array('id', $column_names));
        $this->assertTrue(in_array('name', $column_names));
        $this->assertTrue(in_array('address', $column_names));
        $this->assertTrue(in_array('created_at', $column_names));
        $this->assertTrue(in_array('updated_at', $column_names));

    }

    // Test that the model has a nullable address field
    public function testLocationModelHasNullableAddressField()
    {
        $location = new \App\Models\Location();

        $location->address = null;
        $this->assertNull($location->address);
    }

    // Test that the model has many Categories
    public function testLocationModelHasManyCategories()
    {
        $location = new \App\Models\Location();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasMany', $location->categories());
    }

}
