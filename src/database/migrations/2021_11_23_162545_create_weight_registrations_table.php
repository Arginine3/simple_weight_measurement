<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('your_name', 20);
            $table->boolean('gender');
            $table->unsignedTinyInteger('height');
            $table->unsignedTinyInteger('weight');
            $table->unsignedInteger('measurement_date');
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
        Schema::dropIfExists('weight_registrations');
    }
}
