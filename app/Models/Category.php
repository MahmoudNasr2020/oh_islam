<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.33]
// Copyright Reserved  [it v 1.6.33]
class Category extends Model {

	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'categories';
protected $fillable = [
		'id',
		'admin_id',
        'name',
        'description',
		'created_at',
		'updated_at',
		'deleted_at',
	];

    public function Azkars()
    {
        return $this->hasMany('App\Models\Azkar','category_id');
    }

   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($category) {
         });
   }

}
