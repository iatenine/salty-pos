<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

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

        $this->assertObjectHasAttribute('id', $location);
        $this->assertObjectHasAttribute('name', $location);
        $this->assertObjectHasAttribute('address', $location);
        $this->assertObjectHasAttribute('created_at', $location);
        $this->assertObjectHasAttribute('updated_at', $location);
    }

    // Test that the model has a nullable address field
    public function testLocationModelHasNullableAddressField()
    {
        $location = new \App\Models\Location();

        $this->assertObjectHasAttribute('address', $location);
        $this->assertNull($location->address);
    }

    // Test that the model has many Categories
    public function testLocationModelHasManyCategories()
    {
        $location = new \App\Models\Location();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasMany', $location->categories());
    }

}
