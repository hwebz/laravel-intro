<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NiceActionLog extends Model
{
	protected $table = 'nice_action_logs';

    public function nice__actions() {
    	return $this->belongsTo('App\NiceAction');
    }
}
