<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function create(){
    	return view('admin.companies.create', ['title' => 'Create Company']);
    }

    public function show(){
    	return view('admin.companies.show');
    }

    public function edit(){
    	return view('admin.companies.edit');
    }
}
