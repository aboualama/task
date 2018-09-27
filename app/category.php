<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    
	protected $table 	= 'categories';

    protected $fillable = [ 'name' ];



    public function subcategories(){

	return $this->hasMany(subcategory::class , 'category_id');
	
	}


   public function products(){

	return $this->hasManyThrough(product::class, subcategory::class);
	
	}
}
