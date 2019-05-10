<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowDetail extends Model
{
    protected $fillable = [
    	'item_id', 'total', 'status', 'borrow_id'
    ];

    public function borrow()
    {
    	return $this->belongsTo('App\Borrow','borrow_id','id');
    }

    public function item()
    {
    	return $this->hasOne('App\Item', 'id', 'item_id');
    }
}
