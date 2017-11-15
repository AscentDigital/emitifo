<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class AdminHomeController extends Controller
{
     public function __construct(){
    	$this->middleware('auth');
    }

    public function show(){
    	$messages = Message::orderBy('created_at', 'DESC')->limit(10)->get();
    	return view('admin.home', ['title' => 'Dashboard', 'messages' => $messages]);
    }
}
