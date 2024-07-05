<?php

namespace App\Models;
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Accessorie extends Model
{
    use SoftDeletes;
	protected $table = 'accessories';
	protected $guard_name = 'web';

	protected $fillable = ['name_acce', 'code_ac','quantity_ac','piece_number','equip_id'];

	public function equipments() {
		return $this->hasMany('App\Equipment', 'equip_id');
	}
 
}