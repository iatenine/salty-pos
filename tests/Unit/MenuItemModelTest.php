<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Schema;

class MenuItemModelTest extends TestCase
{
    // Test Menu Item Model exists
    public function testMenuItemModelExists()
    {
        $this->assertTrue(class_exists('App\Models\MenuItem'));
    }

    // Test Menu Item Model has attributes
    public function testMenuItemModelHasAttributes()
    {
        $menuItem = new \App\Models\MenuItem();
        $column_names = Schema::getColumnListing($menuItem->getTable());

        $this->assertTrue(in_array('id', $column_names));
        $this->assertTrue(in_array('name', $column_names));
        $this->assertTrue(in_array('price', $column_names));
        $this->assertTrue(in_array('created_at', $column_names));
        $this->assertTrue(in_array('updated_at', $column_names));
    }

    // Test Menu Item Model has many Ingredients
    public function testMenuItemModelHasManyIngredients()
    {
        $menuItem = new \App\Models\MenuItem();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasMany', $menuItem->ingredients());
    }

    // Test Menu Item belongs to many Categories
    public function testMenuItemBelongsToManyCategories()
    {
        $menuItem = new \App\Models\MenuItem();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\BelongsToMany', $menuItem->categories());
    }

}
