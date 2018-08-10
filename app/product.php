<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    
	protected $table 	= 'products';

    protected $fillable = [ 'name', 'description', 'price', 'subcategory_id', 'brand_id', 'admin_id', 'photo' ];

    
    public function subcategory(){ 
        return $this->belongsTo(Subcategory::class);
    }    

    public function brand(){ 
    	return $this->belongsTo(brand::class);
    }

    public function admin(){
    	return $this->belongsTo(Admin::class);
    }

    public function Comments(){

        return $this->hasMany(Comment::class);
    }
}

