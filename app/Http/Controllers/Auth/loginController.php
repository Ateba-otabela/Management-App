<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class loginController extends Controller
{
  
    
    public function login_user(Request $request) : RedirectResponse
    {
        
        // Validate user input
        $credentials = $request->validate([
            'email' => 'required|email', // Fixed email validation
            'password' => 'required|min:6' // Removed max limit
    
        ]);
             // Attempt to log in the user
             
    if (!Auth::attempt($credentials)) {
        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
    }

    // Prevent session fixation attacks
    $request->session()->regenerate();
    //dd(Auth::user()->profile_picture);
    
    // Redirect to dashboard
    return redirect()->intended(route('manage_task'))->with('success', 'User logged in successfully, Welcome ' . Auth::user()->name. '!');
    
    }
    
   public function logout_user(Request $request){
      Auth::logout(); //logout user

      $request->session()->invalidate(); // Clears session data
      $request->session()->regenerateToken(); // Prevents CSRF token issues
  
      return redirect('/login')->with('success', 'You have been logged out.');
   } 
    
}
