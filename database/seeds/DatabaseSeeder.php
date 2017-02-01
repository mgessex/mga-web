<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(GroupsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(EventTypesTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(AttendeesTableSeeder::class);
    }
}
