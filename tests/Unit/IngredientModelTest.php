<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;

class IngredientModel extends TestCase
{
    /**
     * Test model has the proper attributes and relationships.
     *
     * @return void
     */
    // Check model exists
    public function testIngredientModelExists()
    {
        $this->assertTrue(class_exists('App\Models\Ingredient'));
    }

    // Check model has the proper attributes
    public function testIngredientModelHasAttributes()
    {
        $ingredient = new \App\Models\Ingredient();
        $column_names = Schema::getColumnListing($ingredient->getTable());

        $this->assertTrue(in_array('id', $column_names));
        $this->assertTrue(in_array('name', $column_names));
        $this->assertTrue(in_array('available', $column_names));
        $this->assertTrue(in_array('created_at', $column_names));
        $this->assertTrue(in_array('updated_at', $column_names));
    }

    // Check name cannot be null
    public function testIngredientModelNameCannotBeNull()
    {
        $ingredient = new \App\Models\Ingredient();
        $ingredient->name = null;
        $this->assertNotNull($ingredient->name);
    }

    // Check available cannot be null
    public function testIngredientModelAvailableCannotBeNull()
    {
        $ingredient = new \App\Models\Ingredient();
        $ingredient->available = null;
        $this->assertNotNull($ingredient->available);
    }

    // Check available is boolean
    public function testIngredientModelAvailableIsBoolean()
    {
        $ingredient = new \App\Models\Ingredient();
        $value = $ingredient->available;
        $this->assertTrue(is_bool($value));
    }

    // Check true is the default value of available
    public function testIngredientModelAvailableIsTrue()
    {
        $ingredient = new \App\Models\Ingredient();
        $value = $ingredient->available;
        $this->assertTrue($value);
    }

    // Check model belongs to many menu_items
    public function testIngredientModelBelongsToManyMenuItems()
    {
        $ingredient = new \App\Models\Ingredient();

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Relations\BelongsToMany',
            $ingredient->menuItems()
        );
    }

}
