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
        Schema::create('performance_testing', function (Blueprint $table) {
            $table->id();
            $table->enum('verifies_battery_operation', ['Pass', 'Fail', 'N/A'])->nullable();
            $table->enum('fan_operation', ['Pass', 'Fail', 'N/A'])->nullable();
            $table->enum('warm_up_time', ['Pass', 'Fail', 'N/A'])->nullable();
            $table->enum('air_temperature_accuracy', ['Pass', 'Fail', 'N/A'])->nullable();
            $table->enum('skin_temperature_accuracy', ['Pass', 'Fail', 'N/A'])->nullable();
            $table->enum('temperature_overshoot', ['Pass', 'Fail', 'N/A'])->nullable();
            $table->enum('relative_humidity', ['Pass', 'Fail', 'N/A'])->nullable();
            $table->enum('air_flow', ['Pass', 'Fail', 'N/A'])->nullable();
            $table->enum('air_temperature_alarms', ['Pass', 'Fail', 'N/A'])->nullable();
            $table->enum('skin_temperature_alarms', ['Pass', 'Fail', 'N/A'])->nullable();
            $table->enum('high_temperature_protection', ['Pass', 'Fail', 'N/A'])->nullable();
             
            $table->float('noise_Level',8,2);
            $table->string('noiseClassification');
            $table->enum('alarm_function', ['Pass', 'Fail', 'N/A'])->nullable();
            $table->enum('complete_model_testing', ['Pass', 'Fail', 'N/A'])->nullable();
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performance_testing');
    }
};
