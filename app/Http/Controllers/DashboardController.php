<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class DashboardController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function show(){
    	$messages = auth()->user()->company->messages()->orderBy('created_at', 'DESC')->limit(10)->get();;
    	return view('dashboard.show', ['title' => 'Dashboard', 'messages' => $messages]);
    }
}
