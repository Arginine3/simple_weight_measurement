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
            $table->string('clint_name', 50);
            $table->date('birth_date')->nullable();
            $table->boolean('sex');
            $table->decimal('height', 5, 1)->default(0);
            $table->decimal('weight', 5, 1)->default(0);
            $table->string('measurement_date', 20)->nullable();
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
