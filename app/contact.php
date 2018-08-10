<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
	protected $table 	= 'contacts';

    protected $fillable = [ 'email', 'phone', 'fax', 'country', 'city', 'address', 'lat', 'lan' ];
}
