<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

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
        $this->assertObjectHasAttribute('id', $category);
        $this->assertObjectHasAttribute('name', $category);
        $this->assertObjectHasAttribute('created_at', $category);
        $this->assertObjectHasAttribute('updated_at', $category);
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
