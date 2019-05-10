<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
    	'borrow_date', 'return_date', 'status', 'employee_id', 'user_id', 'approve'
    ];

    public function detail_borrow()
    {
    	return $this->hasMany('App\BorrowDetail','borrow_id','id');
    }

    public function employee()
    {
    	return $this->hasOne('App\Employee','id','employee_id');
    }

    public function user()
    {
    	return $this->hasOne('App\User','id','user_id');
    }
}
