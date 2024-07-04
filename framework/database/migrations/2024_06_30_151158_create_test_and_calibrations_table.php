<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_and_calibrations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
			$table->integer('equip_id')->nullable();

            $table->text('hospital')->nullable();
            $table->text('governorate')->nullable();
            $table->text('directorate')->nullable();
            $table->string('certificate_no')->nullable();

            // $table->string('name')->nullable();
            // $table->string('manufacturer')->nullable();
            // $table->string('serial_number')->nullable();
            // $table->string('number')->nullable();
            // $table->string('model')->nullable();
            // $table->string('location')->nullable();
            $table->integer('technician')->nullable();
            $table->string('test_type_incoming')->nullable();
            $table->string('post_repair')->nullable();
            $table->date('date')->nullable();
            $table->string('physical_condition')->nullable();
            $table->string('electrical_safety')->nullable();
            $table->string('preventive_maintenance')->nullable();
            $table->string('performance_testing')->nullable();
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
        Schema::dropIfExists('_test_and__calibration');
    }
};
