<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Campaign extends Model
{
	use Eloquence;

    protected $fillable = ['title', 'description','company_id','created_by'];
    protected $searchableColumns = ['title', 'description'];

    public function user(){
    	return $this->belongsTo(User::class, 'created_by');
    }
}
