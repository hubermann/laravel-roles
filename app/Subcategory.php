<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
  public function categories() 
  {
  	return $this->belongsTo('Category');
  }

	public function products() 
	{
		#return $this->hasManyThrough('App\Product', 'App\Subcategory','id','subcategory_id','id');
		return $this->hasMany('App\Product');
	}

}
