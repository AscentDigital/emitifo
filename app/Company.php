<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function keywords(){
    	return $this->hasMany(Keyword::class);
    }

    public function campaigns(){
    	return $this->hasMany(Campaign::class);
    }

    public function subscribers(){
    	return $this->belongsToMany(Subscriber::class)->withTimestamps();
    }

    public function messages(){
    	return $this->hasMany(Message::class);
    }
}
