<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    
	protected $table 	= 'socials';

    protected $fillable = [ 'name', 'link' , 'img'   ];
}
