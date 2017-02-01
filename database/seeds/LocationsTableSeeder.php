<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create(
    		[
    		'name' => 'Scotiabank Saddledome',
    		'address' => '555 Saddledome Rise SE, Calgary, AB',
    		'latitude' => 51.0374344,
            'longitude' => -114.0541585,
    		]
   		);

   		Location::create(
    		[
    		'name' => 'McMahon Stadium',
    		'address' => '1817 Crowchild Trail NW, Calgary, AB',
    		'latitude' => 51.0704555,
            'longitude' => -114.121497,
    		]
   		);

   		Location::create(
    		[
    		'name' => 'Bishop Grandin High School',
    		'address' => '111 Haddon Rd SW, Calgary, AB',
    		'latitude' => 50.9754575,
            'longitude' => -114.0787188,
    		]
   		);
    }
}
