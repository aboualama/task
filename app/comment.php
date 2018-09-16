<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    
	protected $table 	= 'comments';

    protected $fillable = [ 'comment', 'user_id', 'product_id', 'status', ];

    public function user(){
    	return $this->belongsTo(user::class);
    } 
    public function product(){
    	return $this->belongsTo(product::class);
    } 
}
