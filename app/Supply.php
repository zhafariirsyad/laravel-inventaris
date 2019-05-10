<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = [
    	'item_id', 'total', 'register_date'
    ];

    public function item()
    {
    	return $this->hasOne('App\Item','id','item_id');
    }
}
