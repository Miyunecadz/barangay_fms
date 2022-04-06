<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Name field is required'
        ]);

        $user = User::find(Auth::user()->id);
        $user->update($request->all());

        return back()->with('success', 'Profile successfully updated!');
    }

    public function passwordIndex()
    {
        return view('profile.password');
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ],[
            'current_password.required' => 'Current Password field is required',
            'password.required' => 'Password field is required',
            'password.confirmed' => 'Password does not match'
        ]);

        if(!Hash::check($request->current_password, auth()->user()->password)){
            return redirect()->back()->withErrors(['current_password' => 'Invalid Current Password'])->withInput();
        }

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        return back()->with('success', 'Password successfully updated!');
    }
}
