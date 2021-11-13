<?php

namespace Tests\Unit;

use App\Models\Ingredient;
use Tests\TestCase;
use App\Models\User;

class IngredientTest extends TestCase
{
    /**
     * Test ingredient class
     *
     * @return void
     */

   public function test_ingredient_has_name()
   {
       $ingredient = Ingredient::make([
              'name' => 'test',
       ]);
         $this->assertNotNull($ingredient->name);
   }

   public function test_ingredient_has_available()
   {
       $ingredient = Ingredient::make([
              'name' => 'test',
                'available' => true,
       ]);
         $this->assertNotNull($ingredient->available);
   }

   public function test_ingredient_can_be_destroyed(){
         $ingredient = Ingredient::make([
                  'name' => 'test',
                 'available' => true,
         ]);
         Ingredient::destroy($ingredient->id);
         $this->assertTrue($ingredient->trashed());
   }

   public function test_ingredient_edit_name(){
         $ingredient = Ingredient::make([
                  'name' => 'test',
                 'available' => true,
         ]);
         $ingredient->name = 'test2';
         $this->assertEquals('test2', $ingredient->name);
   }

   public function test_ingredient_edit_available(){
         $ingredient = Ingredient::make([
                    'name' => 'test',
                     'available' => true,
             ]);
                $ingredient->available = false;
                $this->assertEquals(false, $ingredient->available);
            }
}
