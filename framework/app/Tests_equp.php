<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tests_equp extends Model {
	use SoftDeletes;
	protected $table = 'tests_equps';
	protected $guard_name = 'web';

	protected $fillable = [
        'equip_id',
        'stage1_test1_status',
        'stage1_test2_description',
        'stage2_test1_status',
        'stage2_test2_description',
        'stage3_test1_status',
        'stage3_test2_description',
        'stage4_test1_status',
        'stage4_test2_description',
    ];

	// public function equipments() {
	// 	return $this->hasMany('App\Equipment', 'department');
	// }
	public function equipment() {
		return $this->belongsTo('App\Equipment', 'equip_id')->withTrashed();
	}
}