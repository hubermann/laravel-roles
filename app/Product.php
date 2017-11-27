<?php

namespace App;
//https://laracasts.com/discuss/channels/laravel/relationship-products-and-categories-and-subcategories

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function categories() 
  {   
  	return $this->belongsTo('Category');
  }

	public function subcategories() 
	{
		return $this->belongsTo('Subcategory');
	}

}
