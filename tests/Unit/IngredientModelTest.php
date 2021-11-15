<?php

namespace Tests\Unit;

use Tests\TestCase;

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

        $this->assertObjectHasAttribute('id', $ingredient);
        $this->assertObjectHasAttribute('name', $ingredient);
        $this->assertObjectHasAttribute('available', $ingredient);
        $this->assertObjectHasAttribute('created_at', $ingredient);
        $this->assertObjectHasAttribute('updated_at', $ingredient);
    }

    // Check name cannot be null
    public function testIngredientModelNameCannotBeNull()
    {
        $ingredient = new \App\Models\Ingredient();

        $ingredient->name = null;

        $this->assertFalse($ingredient->save());
    }

    // Check available cannot be null
    public function testIngredientModelAvailableCannotBeNull()
    {
        $ingredient = new \App\Models\Ingredient();
        $ingredient->available = null;
        $this->assertFalse($ingredient->save());
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
