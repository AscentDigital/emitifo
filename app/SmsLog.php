<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class SmsLog extends Model
{
	use Eloquence;

    protected $fillable = ['number', 'misc', 'price', 'status', 'message_id', 'date_sent'];
    protected $dates = ['date_sent'];

    public function message(){
    	return $this->belongsTo(Message::class);
    }
}
