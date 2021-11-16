<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;


class CategoryModelTest extends TestCase
{
    /**
     * Test Category Model has appropriate attributes and relationships
     */

    // Check model exists
    public function testCategoryModelExists(){
        $this->assertTrue(class_exists('App\Models\Category'));
    }


    // Check all expected attributes are present
    public function testCategoryModelHasAttributes(){
        $category = new \App\Models\Category();
        $column_names = Schema::getColumnListing($category->getTable());

        $this->assertTrue(in_array('id', $column_names));
        $this->assertTrue(in_array('name', $column_names));
        $this->assertTrue(in_array('created_at', $column_names));
        $this->assertTrue(in_array('updated_at', $column_names));
    }

    // Check name cannot be null
    public function testCategoryModelNameCannotBeNull(){
        $category = new \App\Models\Category();
        $category->name = null;
        $this->assertFalse($category->save());
        $this->assertCount(1, $category->getErrors());
    }

    // Check model has many menu items
    public function testCategoryModelHasManyMenuItems(){
        $category = new \App\Models\Category();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasMany', $category->menuItems());
    }

    // Check model belongs to one location
    public function testCategoryModelBelongsToOneLocation(){
        $category = new \App\Models\Category();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\BelongsTo', $category->location());
    }

}
