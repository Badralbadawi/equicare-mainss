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
        Schema::create('Preventive_maintenances', function (Blueprint $table) {
            $table->id();
            $table->enum('clean_cooling_vents_and_filters', ['Pass', 'Fail', 'N/A']);
            $table->enum('Inspect_and_clean_ducts_heater_and_fans', ['Pass', 'Fail', 'N/A']);
            $table->enum('Inspect_gaskets_for_signs_of_deterioration', ['Pass', 'Fail', 'N/A']);
            $table->enum('Inspect_port_closures_and_port_sleeves', ['Pass', 'Fail', 'N/A']);
            $table->enum('Replace_battery_every_24_months', ['Pass', 'Fail', 'N/A']);
            $table->enum('Complete_model_specific_preventive_maintenance', ['Pass', 'Fail', 'N/A']);
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
        Schema::dropIfExists('Preventive_maintenances');
    }
};
