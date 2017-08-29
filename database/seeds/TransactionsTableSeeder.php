<?php

use Illuminate\Database\Seeder;
use App\Transaction;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///////////////////////////////// Kaitlin Essex

        Transaction::create(
            [
            'activity' => 'Flames Game Mar 29',
            'student_id' => 2,
            'student_name' => 'Kaitlin Essex',
            'user_id' => 1,
            'user_name' => 'Michael Essex',
            'event_id' => 1,
            'is_credit' => 1,
            'amount' => 50,
            ]
        );

        Transaction::create(
            [
            'activity' => 'Flames Game Apr 9',
            'student_id' => 2,
            'student_name' => 'Kaitlin Essex',
            'user_id' => 1,
            'user_name' => 'Michael Essex',
            'event_id' => 2,
            'is_credit' => 1,
            'amount' => 50,
            ]
        );

        Transaction::create(
            [
            'activity' => 'Westjet Tickets Apr 16',
            'student_id' => 2,
            'student_name' => 'Kaitlin Essex',
            'user_id' => 1,
            'user_name' => 'Michael Essex',
            'event_id' => 3,
            'is_credit' => 1,
            'amount' => 150,
            ]
        );

        Transaction::create(
            [
            'activity' => 'Flames Game Apr 20',
            'student_id' => 2,
            'student_name' => 'Kaitlin Essex',
            'user_id' => 2,
            'user_name' => 'Kaitlin Essex',
            'event_id' => 4,
            'is_credit' => 1,
            'amount' => 50,
            ]
        );

        //////////////////////////////////////// Logan Sherry

        Transaction::create(
            [
            'activity' => 'Flames Game Mar 29',
            'student_id' => 7,
            'student_name' => 'Logan Sherry',
            'user_id' => 6,
            'user_name' => 'Heather Sherry',
            'event_id' => 1,
            'is_credit' => 1,
            'amount' => 50,
            ]
        );

        Transaction::create(
            [
            'activity' => 'Flames Game Apr 9',
            'student_id' => 7,
            'student_name' => 'Logan Sherry',
            'user_id' => 7,
            'user_name' => 'Logan Sherry',
            'event_id' => 2,
            'is_credit' => 1,
            'amount' => 50,
            ]
        );

        Transaction::create(
            [
            'activity' => 'Westjet Tickets Apr 16',
            'student_id' => 7,
            'student_name' => 'Logan Sherry',
            'user_id' => 7,
            'user_name' => 'Logan Sherry',
            'event_id' => 3,
            'is_credit' => 0,
            'amount' => -150,
            ]
        );

        Transaction::create(
            [
            'activity' => 'Flames Game Apr 20',
            'student_id' => 7,
            'student_name' => 'Logan Sherry',
            'user_id' => 6,
            'user_name' => 'Heather Sherry',
            'event_id' => 4,
            'is_credit' => 1,
            'amount' => 25,
            ]
        );

        ///////////////////////////////////////////// Calum Sherry

        Transaction::create(
            [
            'activity' => 'Flames Game Mar 29',
            'student_id' => 8,
            'student_name' => 'Calum Sherry',
            'user_id' => 9,
            'user_name' => 'Guy Simms',
            'event_id' => 1,
            'is_credit' => 1,
            'amount' => 50,
            ]
        );

        Transaction::create(
            [
            'activity' => 'Flames Game Apr 9',
            'student_id' => 8,
            'student_name' => 'Calum Sherry',
            'user_id' => 8,
            'user_name' => 'Calum Sherry',
            'event_id' => 2,
            'is_credit' => 1,
            'amount' => 50,
            ]
        );

        Transaction::create(
            [
            'activity' => 'Westjet Tickets Apr 19',
            'student_id' => 8,
            'student_name' => 'Calum Sherry',
            'user_id' => 8,
            'user_name' => 'Calum Sherry',
            'event_id' => 3,
            'is_credit' => 1,
            'amount' => 75,
            ]
        );

        Transaction::create(
            [
            'activity' => 'Flames Game Apr 21',
            'student_id' => 8,
            'student_name' => 'Calum Sherry',
            'user_id' => 6,
            'user_name' => 'Heather Sherry',
            'event_id' => 4,
            'is_credit' => 1,
            'amount' => 45,
            ]
        );
    }
}
