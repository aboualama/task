<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    
	protected $table 	= 'subcategories';

    protected $fillable = [ 'name', 'description', 'keywords', 'img', 'r_img', 'r_title', 'l_img', 'l_title', 'category_id' ];

	

	public function category(){

	return $this->belongsTo(category::class);
	
	}
 
    public function products(){

	return $this->hasMany(product::class);
	
	}
}
