<?php

use Illuminate\Database\Seeder;
use App\EventType;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventType::create(
    		[
    		'name' => 'Flames Game',
    		'location_id' => 1,
    		'credit_type' => 1,
            'credits' => 50,
    		]
   		);

   		EventType::create(
    		[
    		'name' => 'Hitmen Game',
    		'location_id' => 1,
    		'credit_type' => 1,
            'credits' => 50,
    		]
   		);

   		EventType::create(
    		[
    		'name' => 'Roughnecks Game',
    		'location_id' => 1,
    		'credit_type' => 1,
            'credits' => 50,
    		]
   		);

   		EventType::create(
    		[
    		'name' => 'Concert/Other',
    		'location_id' => 1,
    		'credit_type' => 1,
            'credits' => 50,
    		]
   		);

   		EventType::create(
    		[
    		'name' => 'Stampeders Game',
    		'location_id' => 1,
    		'credit_type' => 1,
            'credits' => 60,
    		]
   		);

   		EventType::create(
    		[
    		'name' => 'Band Event',
    		'location_id' => 1,
    		'credit_type' => 2,
            'credits' => 1,
    		]
   		);
    }
}
