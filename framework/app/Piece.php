<?php
   namespace App\Models;
   namespace App;
   use Illuminate\Database\Eloquent\SoftDeletes;
   use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
        use SoftDeletes;
        protected $table = 'pieces';
        protected $guard_name = 'web';
    
        protected $fillable = ['name_p', 'type_pi','code_pi','numper_pi','quantity_pi'];
    
        // public function equipments() {
        // 	return $this->hasMany('App\Equipment', 'department');
        // }
     
    }