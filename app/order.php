<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
     protected $fillable = [
        'user_id', 'email', 'name', 'address', 'city', 'country', 'postalcode', 'phone', 'total', 'error',
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }
    public function products()
    {
        return $this->belongsToMany('App\product')->withPivot('quantity');
    }
}
