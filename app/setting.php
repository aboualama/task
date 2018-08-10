<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    
	protected $table 	= 'settings';

    protected $fillable = [ 'name', 'description', 'status', ];
}



//  'registration' , 'contact' , 'page' , 'social' , 'category' , 'subcategory' , 'product' 