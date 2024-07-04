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
        Schema::create('electrical_safety', function (Blueprint $table) {
    $table->id();
    $table->float('ground_wire_resistance', 8, 2);
        $table->string('ground_wire_resistance_result');
        $table->float('chassis_leakage', 8, 2);
        $table->string('chassis_leakage_result');
        $table->float('patient_leakage_current', 8, 2);
        $table->string('patient_leakage_current_result'); 
           // $table->enum('ground_wire_resistance', ['Pass', 'Fail', 'N/A']);
    // $table->enum('chassis_leakage_current', ['Pass', 'Fail', 'N/A']);
    // $table->enum('patient_leakage_current', ['Pass', 'Fail', 'N/A']);
    $table->enum('ground_wire_presence', ['Pass', 'Fail', 'N/A']);
    $table->enum('ground_to_neutral_voltage', ['Pass', 'Fail', 'N/A']);
    $table->enum('ground_to_line_voltage', ['Pass', 'Fail', 'N/A']);
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
        Schema::dropIfExists(':electrical_safety');
    }
};
