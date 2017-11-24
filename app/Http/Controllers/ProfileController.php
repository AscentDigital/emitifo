<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use File;

class ProfileController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function show(User $user){
    	return view('profile.show', ['user' => $user]);
    }

    public function editdetails(ProfileRequest $request,User $user){
        $user_details = [
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ];

        $avatar = $request->file('avatar');

        if(null !== $avatar){
            $avatarname = time().'.'.$avatar->getClientOriginalExtension();
            $destinationPath = public_path('prof_img');
            $avatar->move($destinationPath, $avatarname);
            if($user->avatar != 'default.png'){
                File::delete(public_path('prof_img') . '/' . $user->avatar);
            }
            $user_details['avatar'] = $avatarname;
        }

        $user->update($user_details);
        session()->flash('success','Your profile has been updated.');
        return redirect('/'.$user->username.'/profile');
    }

    public function resetpassword(PasswordRequest $request,User $user){
    	if (Hash::check(bcrypt($request->input('old_password')), $user->password)){
        return redirect()->back()->withErrors(['Old password is incorrect ']);
    	}
    	$password_details = [
            'password' => bcrypt($request->input('password'))
        ];

        $user->update($password_details);
        session()->flash('success','Your password has been changed.');
        return redirect('/'.$user->username.'/profile');

    }

}
