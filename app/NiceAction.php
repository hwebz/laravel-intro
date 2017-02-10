<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NiceAction extends Model
{
	protected $table = 'nice_actions';
	
    public function logged_actions() {
    	return $this->hasMany('App\NiceActionLog');
    }
}
