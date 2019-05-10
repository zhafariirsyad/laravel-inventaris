<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrokenItem extends Model
{
    protected $fillable = [
    	'item_id', 'borrow_id', 'total', 'broken_date', 'fix_date'
    ];

    public function item()
    {
    	return $this->hasOne('App\Item','id','item_id');
    }

    public function borrow()
    {
    	return $this->hasOne('App\Borrow','id','borrow_id');
    }
}
