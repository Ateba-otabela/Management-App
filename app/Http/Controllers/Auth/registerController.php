<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class registerController extends Controller
{
    public function register_show(){
        return view('Auth.register');
    }
    public function login_show(){
        return view('Auth.login');
    }
    public function register_user(Request $request){
        //Validate the users input
     $validate = request()->validate([
      'name' => 'string|max:225|required',
      'email' => 'email|required|unique:users',
      'password' => 'required|min:4|confirmed',
      'profile_picture' => 'nullable'
      ]);
    if (User::where('email', $request->email)->exists())
       throw ValidationExeption::withMessage([
          'email' => ['This email is already registered, please log in instead']
       ]);
    //retrieve thge profile picture and stores it

     $profilePicturePath = $request->profile_picture->store('profile_pictures');
    
     //register the user in the database

     $user = User::create([
      'name' => request('name'),
      'email' => request('email'),
      'password' => Hash::make(request('password')),
      'profile_picture' => $profilePicturePath
      
     ]);
     Auth::login($user);
     return redirect()->route('login_show')->with('success', 'Registration successful');

      }
     
    }



