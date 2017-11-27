<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategories()
    { 
    	return $this->hasMany(Subcategory::class, 'category_id'); 
    }

		public function products() 
		{
			return $this->hasMany(Product::class, 'subcategory_id');
		}
		
}