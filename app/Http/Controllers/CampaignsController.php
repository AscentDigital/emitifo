<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Campaign;
use App\Http\Requests\CampaignsRequest;

class CampaignsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function show(){
    	$company = auth()->user()->company;
    	if(null !== request('s')){
    	$company = auth()->user()->company;
			$campaigns = $company->campaigns()->search('"'.request('s').'"')->paginate(10);
    	}else{
    		$campaigns = $company->campaigns()->orderBy('created_at', 'DESC')->paginate(10);
    	}
    	return view('campaign.show', ['title' => 'Campaign', 'campaigns' => $campaigns]);
    }

    public function create(){
    	$company = auth()->user()->company;
    	return view('campaign.create', ['title' => 'Create Campaign']);
    }

    public function store(CampaignsRequest $request){
    	$campaign = Campaign::create([
    		'title' => $request->input('title'),
    		'description' => $request->input('description'),
    		'company_id' => auth()->user()->company->id,
    		'created_by' => auth()->user()->id
    	]);
    	
    	session()->flash('success', $request->input('title') . ' has been added.');
    	return redirect('/campaign/create');
    }
}
