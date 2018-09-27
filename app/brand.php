<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    
	protected $table 	= 'brands';

    protected $fillable = [ 'name', 'description', 'keywords', 'img'  ];

	
 
 
    public function products(){

	return $this->hasMany(product::class);
	
	}
}
