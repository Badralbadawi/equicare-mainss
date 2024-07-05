<?php

namespace App\Models;
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use SoftDeletes;
	protected $table = 'suppliers';
	protected $guard_name = 'web';

	protected $fillable = ['name', 'email','phone_no','adress'];

	// public function equipments() {
	// 	return $this->hasMany('App\Equipment', 'department');
	// }
 
}