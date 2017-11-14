<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Keyword extends Model
{
	use Eloquence;

    protected $fillable = ['keyword', 'description','reply','campaign_id','company_id', 'created_by'];
    protected $searchableColumns = ['keyword', 'description', 'reply'];

    public function user(){
    	return $this->belongsTo(User::class, 'created_by');
    }
}
