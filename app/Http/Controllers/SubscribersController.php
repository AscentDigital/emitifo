<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sofa\Eloquence\Eloquence;

class SubscribersController extends Controller
{
	use Eloquence;

   public function show(){
    	$company = auth()->user()->company;
		if(null !== request('s')){
			$subscribers = $company->subscribers()->search('"'.request('s').'"')->paginate(10);
    	}else{
    		$subscribers = $company->subscribers()->orderBy('created_at', 'DESC')->paginate(10);
    	}
    	return view('subscriber.show', ['title' => 'Subscribers', 'subscribers' => $subscribers]);
    }
}
