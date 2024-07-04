<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestCalibration extends Model
{
    protected $table = 'test_and_calibrations';
	protected $guard_name = 'web';

	protected $fillable = ['name','manufacturer','serial_number','number','model','location','technician','test_type_incoming','post_repair','date','physical_condition','electrical_safety','preventive_maintenance','performance_testing','governorate','directorate','hospital'];

// 	public function equipments() {
// 		return $this->hasMany('App\specification', 'department');
// 	}
	 
}
