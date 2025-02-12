<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if(Schema::hasTable('equipments')){
            return;
        }
		Schema::create('equipments', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('short_name')->nullable();
			$table->string('user_id')->nullable();
			$table->integer('hospital_id')->nullable();
			$table->integer('brand_id')->nullable();
			$table->integer('accesory_id')->nullable();
			$table->integer('model_id')->nullable();
			$table->string('address')->nullable(); //geolocalization
			$table->string('company')->nullable();
			$table->string('model')->nullable();
			$table->string('sr_no')->nullable();
			$table->string('department')->nullable();
			$table->string('provenance')->nullable();
			$table->string('Donor')->nullable();
			$table->string('unique_id')->unique()->nullable();
			$table->date('order_date')->nullable()->default(null);
			$table->date('date_of_purchase')->nullable()->default(null);
			$table->date('production_date')->nullable()->default(null);
			$table->date('date_of_installation')->nullable()->default(null);
			$table->date('warranty_due_date')->nullable()->default(null);
			$table->string('service_engineer_no')->nullable();
			$table->string('CATALOGUE')->nullable();
			$table->string('name_donors')->nullable();
			$table->string('phone_donors')->nullable();
			$table->string('directorate')->nullable();
			$table->string('governorate')->nullable();
			$table->integer('model_number')->nullable();
			$table->string('Location')->nullable();
			$table->string('Manufacturer')->nullable();


			// $table->string('type_of_healthfcilityS');
			$table->date('next_maintenance_date')->nullable();

			
			$table->boolean('is_critical')->nullable();

			$table->text('notes')->nullable();
			$table->string('qr_id')->nullable();
			$table->string('latitude')->nullable();
			$table->string('longitude')->nullable();
			$table->SoftDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('equipments');
	}
}
