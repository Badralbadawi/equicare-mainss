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
        Schema::create('preparation', function (Blueprint $table) {
            $table->id();
            $table->integer('hospital_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('equipments_id')->nullable();
            $table->integer('servicerequest_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('type_pr')->nullable();
            $table->text('note')->nullable();
            $table->date('date')->nullable();

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
        Schema::dropIfExists('preparation');
    }
};
