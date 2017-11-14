<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Message extends Model
{
	use Eloquence;

    protected $fillable = ['number', 'message', 'misc', 'price', 'type', 'origin', 'total_sms', 'schedule', 'campaign_id', 'company_id', 'status'];

    public function logs(){
    	return $this->hasMany(SmsLog::class);
    }

    public function company(){
    	return $this->belongsTo(Company::class);
    }

    public function campaign(){
    	return $this->belongsTo(Campaign::class);
    }

    public function getSender(){
    	$sender = 'PrEPSMS';
    	if($this->type == 'incoming'){
    		$sender = $this->number;
    	}

    	return $sender;
    }

    public function getRecipient(){
    	$recipient = 'PrEPSMS';
    	if($this->type == 'outgoing'){
    		$recipient = $this->number;
    	}
    	return $recipient;
    }

    public function getTotalLogs($precision = 1 ) {
   		$n = $this->logs()->count();
		if ($n < 900) {
			// 0 - 900
			$n_format = number_format($n, $precision);
			$suffix = '';
		} else if ($n < 900000) {
			// 0.9k-850k
			$n_format = number_format($n / 1000, $precision);
			$suffix = 'K';
		} else if ($n < 900000000) {
			// 0.9m-850m
			$n_format = number_format($n / 1000000, $precision);
			$suffix = 'M';
		} else if ($n < 900000000000) {
			// 0.9b-850b
			$n_format = number_format($n / 1000000000, $precision);
			$suffix = 'B';
		} else {
			// 0.9t+
			$n_format = number_format($n / 1000000000000, $precision);
			$suffix = 'T';
		}
	  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
	  // Intentionally does not affect partials, eg "1.50" -> "1.50"
		if ( $precision > 0 ) {
			$dotzero = '.' . str_repeat( '0', $precision );
			$n_format = str_replace( $dotzero, '', $n_format );
		}
		return $n_format . $suffix;
	}
}
