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
            'open_date' => '2017-08-02',
            'open_time' => '11:00:00',
            'start_date' => '2017-08-21',
            'start_time' => '17:45',
            // End Date & Time are not required
            'location_id' => 1,
            'credit_type' => 'Band Bucks',
            'credits' => 50,
            'manager_id' => 1, // 1 = Michael Essex
            // Allow Students has a default = 1
            'required_adults' => 3,
            'required_youths' => 2,
            //'attending_adults' => 2,
            //'attending_youths' => 1,
            ]
        );

        Event::create(
            [
            'event_type_id' => 1,
            'name' => 'Flames',
            'status' => 'Open',
            'open_date' => '2017-08-11',
            'open_time' => '11:05:00',
            'start_date' => '2017-08-22',
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
            'open_date' => '2017-08-12',
            'open_time' => '11:10:00',
            'start_date' => '2017-08-23',
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
            'open_date' => '2017-08-13',
            'open_time' => '11:15:00',
    		'start_date' => '2017-08-24',
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
            'open_date' => '2017-08-14',
            'open_time' => '11:20:00',
    		'start_date' => '2017-08-25',
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
            'open_date' => '2017-08-15',
            'open_time' => '11:25:00',
    		'start_date' => '2017-08-26',
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
            'open_date' => '2017-08-16',
            'open_time' => '11:30:00',
    		'start_date' => '2017-08-27',
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
            'open_date' => '2017-08-10',
            'open_time' => '11:45:00',
    		'start_date' => '2017-08-16',
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
            'open_date' => '2017-08-15',
            'open_time' => '11:50:00',
    		'start_date' => '2017-08-17',
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
            'open_date' => '2017-08-18',
            'open_time' => '11:55:00',
    		'start_date' => '2017-08-20',
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
            'open_date' => '2017-08-02',
            'open_time' => '12:00:00',
    		'start_date' => '2017-08-26',
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

        /////////////////// Past Events ///////////////////////////

        Event::create(
            [
            'event_type_id' => 4,
            'name' => 'Concert',
            'status' => 'Open',
            'open_date' => '2017-08-02',
            'open_time' => '11:00:00',
            'start_date' => '2017-08-10',
            'start_time' => '17:45',
            // End Date & Time are not required
            'location_id' => 1,
            'credit_type' => 'Band Bucks',
            'credits' => 50,
            'manager_id' => 1, // 1 = Michael Essex
            // Allow Students has a default = 1
            'required_adults' => 3,
            'required_youths' => 2,
            //'attending_adults' => 2,
            //'attending_youths' => 1,
            ]
        );

        Event::create(
            [
            'event_type_id' => 1,
            'name' => 'Flames',
            'status' => 'Open',
            'open_date' => '2017-08-11',
            'open_time' => '11:05:00',
            'start_date' => '2017-08-12',
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
            'open_date' => '2017-08-12',
            'open_time' => '11:10:00',
            'start_date' => '2017-08-13',
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
            'open_date' => '2017-08-13',
            'open_time' => '11:15:00',
            'start_date' => '2017-08-14',
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
            'status' => 'Open',            
            'open_date' => '2017-08-14',
            'open_time' => '11:20:00',
            'start_date' => '2017-08-15',
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
            'status' => 'Open',
            'open_date' => '2017-08-15',
            'open_time' => '11:25:00',
            'start_date' => '2017-08-16',
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
            'status' => 'Open',
            'open_date' => '2017-08-16',
            'open_time' => '11:30:00',
            'start_date' => '2017-08-17',
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
            'open_date' => '2017-08-10',
            'open_time' => '11:45:00',
            'start_date' => '2017-08-11',
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
            'status' => 'Open',
            'open_date' => '2017-08-15',
            'open_time' => '11:50:00',
            'start_date' => '2017-08-17',
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
            'status' => 'Open',
            'open_date' => '2017-08-18',
            'open_time' => '11:55:00',
            'start_date' => '2017-08-20',
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
            'status' => 'Open',
            'open_date' => '2017-08-02',
            'open_time' => '12:00:00',
            'start_date' => '2017-08-26',
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