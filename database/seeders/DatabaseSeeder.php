<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Language;
use App\Models\Meal;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //add categories
        Category::factory(10)->create();
        //translate categories
        foreach (Category::all() as $category) {
            $title = $category->title;
            $category->translateOrNew('en')->title = 'EN ' .  $title;
            $category->translateOrNew('hr')->title = 'HR ' .  $title;
            $category->save();
        }

        //add tags
        Tag::factory(10)->create();
        //translate tags
        foreach (Tag::all() as $tag) {
            $title = $tag->title;
            $tag->translateOrNew('en')->title = 'EN ' .  $title;
            $tag->translateOrNew('hr')->title = 'HR ' .  $title;
            $tag->save();
        }

        //add ingredients
        Ingredient::factory(10)->create();
        //add translate
        foreach (Ingredient::all() as $ingredient) {
            $title = $ingredient->title;
            $ingredient->translateOrNew('en')->title = 'EN ' .  $title;
            $ingredient->translateOrNew('hr')->title = 'HR ' .  $title;
            $ingredient->save();
        }

        //add meals
        Meal::factory(100)->create();
        //translate meals
        foreach (Meal::all() as $meal) {
            $title = $meal->title;
            $description = $meal->description;
            $meal->translateOrNew('en')->title = 'EN ' .  $title;
            $meal->translateOrNew('hr')->title = 'HR ' .  $title;
            $meal->translateOrNew('en')->description = 'EN ' .  $description;
            $meal->translateOrNew('hr')->description = 'HR ' .  $description;
            $meal->save();

            //attach tags to meal
            foreach (Tag::inRandomOrder()->limit(3)->get() as $tag) {
                $meal->tags()->attach($tag);
            }
            //attach ingrediants to meal
            foreach (Ingredient::inRandomOrder()->limit(3)->get() as $ingredient) {
                $meal->ingredients()->attach($ingredient);
            }
        }
        //delete some meals
        foreach (Meal::inRandomOrder()->limit(10)->get() as $meal) {
            $meal->delete();
        }
        //modify some meals
        foreach (Meal::inRandomOrder()->limit(10)->get() as $meal) {
            $meal->updated_at = now();
            $meal->save();
        }

        // add languages
        $english = new Language();
        $english->title = 'English';
        $english->lang = 'en';
        $english->save();
        $croatian = new Language();
        $croatian->title = 'Croatian';
        $croatian->lang = 'hr';
        $croatian->save();
    }
}
