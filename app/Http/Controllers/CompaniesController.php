<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompaniesRequest;
use App\Company;
use App\User;

class CompaniesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function create(){
    	return view('admin.companies.create', ['title' => 'Create Company']);
    }

    public function store(CompaniesRequest $request){
        $slug = Company::makeSlugFromTitle($request->input('title'));
        $company_details = [
            'title' => $request->input('title'),
            'slug' => $slug,
            'description' => $request->input('description'),
            'code' => $request->input('code'),
            'email' => $request->input('company_email'),
            'contact' => $request->input('contact')
        ];

        if($request->file('logo') != null){
            $logo = $request->file('logo');
            $logoname = time().'.'.$logo->getClientOriginalExtension();
            $destinationPath = public_path('logos');
            $logo->move($destinationPath, $logoname);
            $company_details['logo'] = $logoname;
        }

        if($request->file('backdrop') != null){
            $backdrop = $request->file('backdrop');
            $backdropname = time().'.'.$backdrop->getClientOriginalExtension();
            $destinationPath = public_path('backdrops');
            $backdrop->move($destinationPath, $backdropname);
            $company_details['backdrop'] = $backdropname;
        }

        $company = Company::create($company_details);

        User::create([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'type' => 'user',
            'company_id' => $company->id
        ]);

        session()->flash('success', $request->input('title') . ' has been added.');
        return redirect('/admin/companies/create');
    }

    public function show(){
        if(null !== request('s')){
            $companies = Company::search('"'.request('s').'"')->orderBy('title')->paginate(10);
        }else{
            $companies = Company::orderBy('created_at', 'DESC')->paginate(10);
        }
    	return view('admin.companies.show', ['title' => 'Companies', 'companies' => $companies]);
    }

    public function edit(){
    	return view('admin.companies.edit');
    }
}
