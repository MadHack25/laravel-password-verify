<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /** Change Password View [GET] */
    public function changePass(){
        return view('changepass');
    }

    /** Update Password [POST] */
    public function updatePass(Request $request){

        $validatedData = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        if($validatedData){
            /** Grabb Active User */
            $user = auth()->user();
            /** Update Password */
            $user->password = Hash::make($request["password"]);
            /** Set pass_changed to TRUE */
            $user->pass_changed = "True";
            /** Save */
            $user->save();
            /** Logout */
            Auth::logout();
                /** Redirect To Login Page */
                return redirect('/login');
        }
        else 
            return redirect()->back();
    }
}
