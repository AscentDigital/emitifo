<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct(){
		$this->middleware('guest', ['except' => 'destroy']);
	}

	public function login(){
		return view('sessions.login', ['title' => 'Login']);
	}

	public function sigin(){
		$remember = false;
		if(null != request('remember_me')){
			$remember = true;
		}
		if(!auth()->attempt(request(['username', 'password']), $remember)){
			return back()->withErrors([
				'messages' => 'Invalid username or password.'
			]);
		}

		$user = auth()->user();
		switch ($user->type) {
			case 'admin':
				$redirect = '/admin';
				break;
			
			default:
				$redirect = '/dashboard';
				break;
		}

		return redirect($redirect);
	}

	public function destroy(){
		auth()->logout();

		return redirect('/');
	}

	public function create(){
		return view('sessions.register', ['title' => 'Register']);
	}
}
