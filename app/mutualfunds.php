<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mutualfunds extends Model
{
    protected $fillable=[
        'customer_id',
        'name',
        'units',
        'purchase_price',
        'purchased',

    ];
	
	
    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}
