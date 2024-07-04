<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Governorate extends Model {
	use SoftDeletes;
	protected $table = 'governorates';
	protected $guard_name = 'web';

	protected $fillable = ['name', 'short_name'];

	public function Directorate() {
		return $this->hasMany('App\Directorate', 'governorate');
	}
 
}
