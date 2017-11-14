<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Keyword;
use App\Http\Requests\KeywordRequest;

class KeywordsController extends Controller
{ 
	public function __construct(){
    	$this->middleware('auth');
    }

    public function show(){
    	$company = auth()->user()->company;
		if(null !== request('s')){
			$keywords = $company->keywords()->search('"'.request('s').'"')->paginate(10);
    	}else{
    		$keywords = $company->keywords()->orderBy('created_at', 'DESC')->paginate(10);
    	}
    	return view('keyword.show', ['title' => 'Keywords', 'keywords' => $keywords]);
    }

    public function create(){
    	$company = auth()->user()->company;
    	$campaigns = $company->campaigns()->orderBy('title')->get();
    	return view('keyword.create', ['title' => 'Create Keyword', 'campaigns' => $campaigns]);
    }

    public function store(KeywordRequest $request){
    	$keyword = Keyword::create([
    		'keyword' => $request->input('keyword'),
    		'description' => $request->input('description'),
    		'reply' => $request->input('reply'),
    		'campaign_id' => $request->input('campaign_id'),
    		'company_id' => auth()->user()->company->id,
    		'created_by' => auth()->user()->id
    	]);
    	
    	session()->flash('success', $request->input('keyword') . ' has been added.');
    	return redirect('/keyword/create');
    }
}
