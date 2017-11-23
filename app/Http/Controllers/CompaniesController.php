<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompaniesRequest;
use App\Company;
use App\User;
use File;

class CompaniesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
        $this->middleware('accessdenied:admin');
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
            'contact' => $request->input('contact'),
            'gateway' => $request->input('gateway')
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
        $bpass = bcrypt($request->input('password'));
        User::create([
            'username' => $request->input('username'),
            'password' => $bpass,
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

    public function edit(Company $company){
    	return view('admin.companies.edit', ['title' => 'Edit ' . $company->title, 'company' => $company]);
    }

    public function update(CompaniesRequest $request, Company $company){
        $company_details = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'code' => $request->input('code'),
            'email' => $request->input('company_email'),
            'contact' => $request->input('contact'),
            'gateway' => $request->input('gateway')
        ];

        if($request->input('title') != $company->title){
             $slug = Company::makeSlugFromTitle($request->input('title'));
             $company_details['slug'] = $slug;
        }

        $logo = $request->file('logo');

        if(null !== $logo){
            $logoname = time().'.'.$logo->getClientOriginalExtension();
            $destinationPath = public_path('logos');
            $logo->move($destinationPath, $logoname);
            if($company->logo != 'default.png'){
                File::delete(public_path('logos') . '/' . $company->logo);
            }
            $company_details['logo'] = $logoname;
        }

        $backdrop = $request->file('backdrop');

        if(null !== $backdrop){
            $backdropname = time().'.'.$backdrop->getClientOriginalExtension();
            $destinationPath = public_path('backdrops');
            $backdrop->move($destinationPath, $backdropname);
            if($company->backdrop != 'default.jpg'){
                File::delete(public_path('backdrops') . '/' . $company->backdrop);
            }
            $company_details['backdrop'] = $backdropname;
        }

        $company->update($company_details);
        session()->flash('success', $request->input('title') . ' has been edited.');
        return redirect('/admin/companies/' . $company->slug . '/edit');
    }
}
