<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    
	protected $table 	= 'categories';

    protected $fillable = [ 'name' ];



    public function subcategories(){

	return $this->hasMany(Subcategory::class , 'category_id');
	
	}


   public function products(){

	return $this->hasManyThrough(Product::class, Subcategory::class);
	
	}
}
