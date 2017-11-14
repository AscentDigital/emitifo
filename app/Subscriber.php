<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Subscriber extends Model
{
	use Eloquence;
    protected $fillable = ['number', 'misc'];
    protected $searchableColumns = ['number'];

    public function companies(){
    	return $this->belongsToMany(Company::class)->withTimestamps();
    }
}
