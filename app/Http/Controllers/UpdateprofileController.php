<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateprofileController extends Controller
{
    public function update_profile(request $request) {
        dd('ok');
        $request->validate([

        ]);
        $user = Auth::user();

        if ($user->profile_picture){
            Storage::disk('public')->delete($user->update_profile);

            $profilPicturePath = null;
            if ($request->hasFile('profile_picture')){
             $file = $request->file('profile_picture');
             $profilPicturePath = Storage::disk('public')->put('profile_pictures', $file); 
            }
           
               
        }
    }
}
