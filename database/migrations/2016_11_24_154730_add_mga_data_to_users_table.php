<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMgaDataToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('group_id')->after('id');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->string('phone1',14)->nullable();
            $table->string('phone2',14)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->decimal('initial_balance',10,2)->default(0);
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_manager')->default(0);
            $table->boolean('is_bookable')->default(1);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_student')->default(0);
            $table->unsignedInteger('designated_student')->nullable();
            $table->boolean('has_proserve')->default(0);
            $table->string('proserve_num',13)->nullable();
            $table->date('proserve_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone1', 'phone2', 'date_of_birth', 'initial_balance', 'is_admin', 'is_manager', 
                'is_bookable', 'is_active', 'is_student', 'has_proserve', 'proserve_num', 'proserve_date'
                ]);
        });
    }
}
