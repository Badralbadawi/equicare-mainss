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
        Schema::create('physical_conditions', function (Blueprint $table) {
            $table->id();
            $table->enum('device_clean_decontaminated', ['Pass', 'Fail', 'N/A']);
            $table->enum('no_physical_damage', ['Pass', 'Fail', 'N/A']);
            $table->enum('switches_controls_operable', ['Pass', 'Fail', 'N/A']);
            $table->enum('display_intensity_adequate', ['Pass', 'Fail', 'N/A']);
            $table->enum('control_labeling_present', ['Pass', 'Fail', 'N/A']);
            $table->enum('hoses_inlets_available', ['Pass', 'Fail', 'N/A']);
            $table->enum('power_cord_accessories_intact', ['Pass', 'Fail', 'N/A']);
            $table->enum('filters_vents_clean', ['Pass', 'Fail', 'N/A']);
            $table->enum('test_result', ['Pass', 'Fail', 'N/A']);
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
        Schema::dropIfExists(':physical_conditions');
    }
};
