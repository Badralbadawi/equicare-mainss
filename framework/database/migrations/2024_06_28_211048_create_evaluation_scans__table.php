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
        Schema::create('evaluation_scans', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->nullable(); // مستخدم التقييم  
			$table->integer('equip_id')->nullable();
			$table->integer('servicerequest_id')->nullable();
			$table->string('call_type')->nullable(); // breakdown/prventive
			$table->string('call_handle')->nullable(); //Internal/external
			$table->string('report_no')->nullable();
            $table->string('reasons_stopping')->nullable(); //اسباب توقف الجهاز 
            $table->string('assess_equipment')->nullable();// تقييم حالةالمعدات
            $table->timestamp('evaluation_scan_date_time')->nullable();//تاريخ تقييم المعدات 
			$table->timestamp('equipment_stops_date_time')->nullable();//تاريخ توقف المعدات 
			$table->string('working_status')->nullable();//حالة عمل  المعدات 
			$table->text('remarks')->nullable(); // ملاحظات وتووصيات التقييم ملاحمم
			// $table->date('next_due_date')->nullable();
			// $table->timestamp('call_complete_date_time')->nullable();
			$table->integer('user_attended')->nullable(); //who attended
			// $table->string('service_rendered')->nullable();
			// $table->text('nature_of_problem')->nullable();
			$table->string('sign_of_engineer')->nullable();
			$table->string('sign_stamp_of_incharge')->nullable();
			$table->boolean('is_contamination')->nullable();
			$table->boolean('from_api')->default(0);
			$table->SoftDeletes();
			$table->timestamps();
			// $table->text('code_error')->nullable();
			// $table->text('Steps_to_solve_the_problem')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation_scans');
    }
};
