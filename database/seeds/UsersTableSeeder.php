<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        User::create(
            [
            'group_id' => 1,
            'name' => 'Michael Essex',
            'email' => 'michael.essex@icloud.com',
            'password' => bcrypt('Sdiserver1'),
            'is_admin' => 1,
            'designated_student' => 2,
            'date_of_birth' => '1973-03-15',
            'has_proserve' => 1,
            'proserve_num' => '201606240009',
            'proserve_date' => '2016-06-30',
            ]
        );

        User::create(
            [
            'group_id' => 1,
            'name' => 'Kaitlin Essex',
            'email' => 'kaitlin.essex@icloud.com',
            'password' => bcrypt('Sdiserver1'),
            'is_admin' => 0,
            'date_of_birth' => '2000-07-06',
            'is_student' => 1,
            ]
        );

        User::create(
            [
            'group_id' => 1,
            'name' => 'Gloria Essex',
            'email' => 'gloria.essex@gmail.com',
            'password' => bcrypt('Sdiserver1'),
            'is_admin' => 0,
            'designated_student' => 2,
            'date_of_birth' => '1976-01-30',
            'has_proserve' => 1,
            'proserve_num' => '201606240009',
            'proserve_date' => '2016-06-30',
            ]
        );

        User::create(
            [
            'group_id' => 1,
            'name' => 'Ethan Essex',
            'email' => 'ethan.essex@icloud.com',
            'password' => bcrypt('Sdiserver1'),
            'is_admin' => 0,
            'designated_student' => 2,
            'date_of_birth' => '2003-03-16',
            ]
        );

        User::create(
            [
            'group_id' => 1,
            'name' => 'Extra-1 Essex',
            'email' => 'extra1.essex@gmail.com',
            'password' => bcrypt('Sdiserver1'),
            'is_admin' => 0,
            'designated_student' => 2,
            'date_of_birth' => '1976-01-30',
            'has_proserve' => 1,
            'proserve_num' => '201606240009',
            'proserve_date' => '2016-06-30',
            ]
        );

        // ---------------------------------------------------

        User::create(
            [
            'group_id' => 2,
            'name' => 'Heather Sherry',
            'email' => 'heather.essex@icloud.com',
            'password' => bcrypt('Sdiserver1'),
            'is_admin' => 1,
            'designated_student' => 7,
            'date_of_birth' => '1973-03-15',
            'has_proserve' => 1,
            'proserve_num' => '201606240007',
            'proserve_date' => '2016-06-30',
            ]
        );

        User::create(
            [
            'group_id' => 2,
            'name' => 'Logan Sherry',
            'email' => 'logan.essex@icloud.com',
            'password' => bcrypt('Sdiserver1'),
            'is_admin' => 0,
            'date_of_birth' => '2000-07-06',
            'is_student' => 1,
            ]
        );

        User::create(
            [
            'group_id' => 2,
            'name' => 'Calum Sherry',
            'email' => 'calum.essex@icloud.com',
            'password' => bcrypt('Sdiserver1'),
            'is_admin' => 0,
            'date_of_birth' => '2000-01-30',
            'is_student' => 1,
            ]
        );

        User::create(
            [
            'group_id' => 2,
            'name' => 'Guy Simms',
            'email' => 'guy.essex@icloud.com',
            'password' => bcrypt('Sdiserver1'),
            'is_admin' => 0,
            'designated_student' => 8,
            'date_of_birth' => '1968-03-16',
            'has_proserve' => 1,
            'proserve_num' => '201606240009',
            'proserve_date' => '2016-06-30',
            ]
        );

        User::create(
            [
            'group_id' => 2,
            'name' => 'Extra-1 Essex',
            'email' => 'extra1.essex@icloud.com',
            'password' => bcrypt('Sdiserver1'),
            'is_admin' => 0,            
            'designated_student' => 8,
            'date_of_birth' => '1976-01-30',
            'has_proserve' => 1,
            'proserve_num' => '201606240009',
            'proserve_date' => '2016-06-30',
            ]
        );

        // for($i = 1; $i <= 10; $i++) {
        // 	User::create(
        // 		[
        // 		'group_id' => 3,
        // 		'name' => $faker->name,
        // 		'email' => $faker->email,
        // 		'password' => bcrypt('secret'),
        //         'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        // 		]
       	// 	);
        // }
    }
}