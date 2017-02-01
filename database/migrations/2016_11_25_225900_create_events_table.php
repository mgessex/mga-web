<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('event_type_id');
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('manager_id');
            $table->string('name');
            $table->enum('status',['Pending','Open','Closed','Cancelled']);
            $table->date('open_date')->nullable();
            $table->time('open_time')->nullable();
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();
            $table->enum('credit_type',['Band Bucks','Volunteer Credits']);
            $table->unsignedInteger('credits');
            $table->boolean('allow_students')->default(1);
            $table->unsignedInteger('required_adults');
            $table->unsignedInteger('required_youths');
            $table->unsignedInteger('attending_adults')->default(0);
            $table->unsignedInteger('attending_youths')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
