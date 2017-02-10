<?php

use Illuminate\Database\Seeder;
use App\NiceAction;

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
    	// Remove all the old records
    	NiceAction::truncate();

    	// Starting to seed new records
        $nice_action = new NiceAction;
        $nice_action->name = "Greet";
        $nice_action->niceness = 3;
        $nice_action->save();

        $nice_action = new NiceAction;
        $nice_action->name = "Hug";
        $nice_action->niceness = 3;
        $nice_action->save();

        $nice_action = new NiceAction;
        $nice_action->name = "Kiss";
        $nice_action->niceness = 3;
        $nice_action->save();

		$nice_action = new NiceAction;
        $nice_action->name = "Yield";
        $nice_action->niceness = 3;
        $nice_action->save();        
    }
}