<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Event::create(
            [
            'event_type_id' => 4,
            'name' => 'Concert',
            'status' => 'Open',
            'start_date' => '2017-01-17',
            'start_time' => '17:45',
            // End Date & Time are not required
            'location_id' => 1,
            'credit_type' => 'Band Bucks',
            'credits' => 50,
            'manager_id' => 1, // 1 = Michael Essex
            // Allow Students has a default = 1
            'required_adults' => 2,
            'required_youths' => 1,
            //'attending_adults' => 2,
            //'attending_youths' => 1,
            ]
        );

        Event::create(
            [
            'event_type_id' => 1,
            'name' => 'Flames',
            'status' => 'Open',
            'start_date' => '2017-01-17',
            'start_time' => '17:45',
            // End Date & Time are not required
            'location_id' => 1,
            'credit_type' => 'Band Bucks',
            'credits' => 50,
            'manager_id' => 1, // 1 = Michael Essex
            // Allow Students has a default = 1
            'required_adults' => 5,
            'required_youths' => 5,
            //'attending_adults' => 1,
            //'attending_youths' => 2,
            ]
        );

        Event::create(
            [
            'event_type_id' => 5,
            'name' => 'Stamps',
            'status' => 'Open',
            'start_date' => '2017-01-21',
            'start_time' => '17:45',
            // End Date & Time are not required
            'location_id' => 1,
            'credit_type' => 'Band Bucks',
            'credits' => 50,
            'manager_id' => 1, // 1 = Michael Essex
            // Allow Students has a default = 1
            'required_adults' => 2,
            'required_youths' => 1,
            //'attending_adults' => 2,
            //'attending_youths' => 1,
            ]
        );

    	Event::create(
    		[
            'event_type_id' => 1,
    		'name' => 'Flames',
    		'status' => 'Open',
    		'start_date' => '2017-01-21',
            'start_time' => '17:45',
            // End Date & Time are not required
            'location_id' => 1,
            'credit_type' => 'Band Bucks',
            'credits' => 50,
            'manager_id' => 1, // 1 = Michael Essex
            // Allow Students has a default = 1
            'required_adults' => 5,
            'required_youths' => 5,
            //'allow_students' => 0,
    		]
   		);

   		Event::create(
    		[
    		'event_type_id' => 2,
            'name' => 'Hitmen',
    		'status' => 'Pending',
    		'start_date' => '2017-01-22',
            'start_time' => '14:15',
            // End Date & Time are not required
            'location_id' => 1,
            'credit_type' => 'Band Bucks',
            'credits' => 50,
            'manager_id' => 1, // 1 = Michael Essex
            // Allow Students has a default = 1
            'required_adults' => 5,
            'required_youths' => 5,
    		]
   		);

   		Event::create(
    		[
    		'event_type_id' => 2,
            'name' => 'Hitmen',
    		'status' => 'Pending',
    		'start_date' => '2017-01-29',
            'start_time' => '14:15',
            // End Date & Time are not required
            'location_id' => 1,
            'credit_type' => 'Band Bucks',
            'credits' => 50,
            'manager_id' => 1, // 1 = Michael Essex
            // Allow Students has a default = 1
            'required_adults' => 5,
            'required_youths' => 5,
    		]
   		);

   		Event::create(
    		[
    		'event_type_id' => 1,
            'name' => 'Flames',
    		'status' => 'Pending',
    		'start_date' => '2017-02-01',
            'start_time' => '17:45',
            // End Date & Time are not required
            'location_id' => 1,
            'credit_type' => 'Band Bucks',
            'credits' => 50,
            'manager_id' => 1, // 1 = Michael Essex
            // Allow Students has a default = 1
            'required_adults' => 5,
            'required_youths' => 5,
    		]
   		);

   		Event::create(
    		[
    		'event_type_id' => 3,
            'name' => 'Roughnecks',
    		'status' => 'Open',
    		'start_date' => '2017-02-04',
            'start_time' => '17:15',
            // End Date & Time are not required
            'location_id' => 1,
            'credit_type' => 'Band Bucks',
            'credits' => 50,
            'manager_id' => 1, // 1 = Michael Essex
            // Allow Students has a default = 1
            'required_adults' => 3,
            'required_youths' => 2,
            //'attending_adults' => 3,
    		]
   		);

   		Event::create(
    		[
    		'event_type_id' => 3,
            'name' => 'Roughnecks',
    		'status' => 'Pending',
    		'start_date' => '2017-02-12',
            'start_time' => '12:15',
            // End Date & Time are not required
            'location_id' => 1,
            'credit_type' => 'Band Bucks',
            'credits' => 50,
            'manager_id' => 1, // 1 = Michael Essex
            // Allow Students has a default = 1
            'required_adults' => 5,
            'required_youths' => 5,
    		]
   		);

   		Event::create(
    		[
    		'event_type_id' => 1,
            'name' => 'Flames',
    		'status' => 'Pending',
    		'start_date' => '2017-02-13',
            'start_time' => '16:45',
            // End Date & Time are not required
            'location_id' => 1,
            'credit_type' => 'Band Bucks',
            'credits' => 50,
            'manager_id' => 1, // 1 = Michael Essex
            // Allow Students has a default = 1
            'required_adults' => 5,
            'required_youths' => 5,
    		]
   		);

   		Event::create(
    		[
    		'event_type_id' => 1,
            'name' => 'Flames',
    		'status' => 'Pending',
    		'start_date' => '2017-02-15',
            'start_time' => '17:15',
            // End Date & Time are not required
            'location_id' => 1,
            'credit_type' => 'Band Bucks',
            'credits' => 50,
            'manager_id' => 1, // 1 = Michael Essex
            // Allow Students has a default = 1
            'required_adults' => 5,
            'required_youths' => 5,
    		]
   		);

    }
}