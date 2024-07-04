<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
USE App\Equipment;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_equps', function (Blueprint $table) {
            $table->id();
            $table->integer('equip_id'); // foreign key referencing the equipment table
            $table->enum('stage1_test1_status', ['pending', 'passed', 'failed'])->nullable();
            $table->text('stage1_test2_description')->nullable();
            $table->enum('stage2_test1_status', ['pending', 'passed', 'failed'])->nullable();
            $table->text('stage2_test2_description')->nullable();
            $table->enum('stage3_test1_status', ['pending', 'passed', 'failed'])->nullable();
            $table->text('stage3_test2_description')->nullable();
            $table->enum('stage4_test1_status', ['pending', 'passed', 'failed'])->nullable();
            $table->text('stage4_test2_description')->nullable();

            $table->timestamps();
        
        });
    }
    /**
     * Reverse the migrationspeq.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests_equps');
    }
};
