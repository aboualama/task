<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    
	protected $table 	= 'pages';

    protected $fillable = [ 'id', 'title', 'keywords', 'description', 'body', 'created_at', 'updated_at' ];
}
