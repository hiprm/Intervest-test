<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummeryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summery', function (Blueprint $table) {
            $table->id();
            $table->integer('local_new_cases', )->length(20)->unsigned();
            $table->integer('local_total_cases', )->length(20)->unsigned();
            $table->integer('local_total_number_of_individuals_in_hospitals')->length(20)->unsigned();
            $table->integer('local_deaths', )->length(20)->unsigned();
            $table->integer('local_new_deaths', )->length(20)->unsigned();
            $table->integer('local_recovered', )->length(20)->unsigned();
            $table->integer('local_active_cases', )->length(20)->unsigned();
            $table->integer('global_new_cases', )->length(20)->unsigned();
            $table->integer('global_total_cases', )->length(20)->unsigned();
            $table->integer('global_deaths', )->length(20)->unsigned();
            $table->integer('global_new_deaths', )->length(20)->unsigned();
            $table->integer('global_recovered', )->length(20)->unsigned();
            $table->dateTime('date');
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
        Schema::dropIfExists('summery');
    }
}
