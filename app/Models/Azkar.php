<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.33]
// Copyright Reserved  [it v 1.6.33]
class Azkar extends Model {

	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'azkars';
protected $fillable = [
		'id',
		'admin_id',
        'number',
        'simple_description',
        'description',
        'zakar',
        'category_id',
		'created_at',
		'updated_at',
		'deleted_at',
	];

 	public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($azkar) {
         });
   }

}
