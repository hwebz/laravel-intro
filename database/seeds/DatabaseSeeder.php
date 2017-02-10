<?php

use Illuminate\Database\Seeder;
use App\NiceAction;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NiceActionSeeder::class);
    }
}

class NiceActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $category1 = new Category();
        $category1->name = "Cat 1";
        $category1->save();

        $category2 = new Category();
        $category2->name = "Cat 2";
        $category2->save();

        $category3 = new Category();
        $category3->name = "Cat 3";
        $category3->save();

    	// Remove all the old records
    	NiceAction::truncate();

    	// Starting to seed new records
        $nice_action = new NiceAction;
        $nice_action->name = "Greet";
        $nice_action->niceness = 3;
        $nice_action->save();

        $category1->nice_actions()->attach($nice_action);
        $category3->nice_actions()->attach($nice_action);

        $nice_action = new NiceAction;
        $nice_action->name = "Hug";
        $nice_action->niceness = 3;
        $nice_action->save();

        $category2->nice_actions()->attach($nice_action);

        $nice_action = new NiceAction;
        $nice_action->name = "Kiss";
        $nice_action->niceness = 3;
        $nice_action->save();

        $category3->nice_actions()->attach($nice_action);

		$nice_action = new NiceAction;
        $nice_action->name = "Yield";
        $nice_action->niceness = 3;
        $nice_action->save();        

        $category1->nice_actions()->attach($nice_action);
        $category2->nice_actions()->attach($nice_action);
    }
}