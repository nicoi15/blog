<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class AccountsController extends Controller
{
    public function authenticateUser()
    {
        if(Auth::user()->role == '1') {
            return view('layouts.admin');
        }
        else {
            return view('layouts.account');
        }
    }
    public function profile()
    {
        return view('accounts.users.profile');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'about' => 'required'
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->about = $request->about;
        $user->save();

        return redirect('/account/profile')->with('success', 'Profile Updated');
    }
    public function changepass()
    {
        return view('accounts.users.changepassword');
    }
    public function updatepass(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->current_password, $hashedPassword)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::logout();
            return redirect()->route('login')->with('success', 'Password has been successfully changed');
        }
        else {
            return redirect()->back()->with('error', 'Current password is invalid');
        }
    }
}
