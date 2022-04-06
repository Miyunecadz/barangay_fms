<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_master_key' => 'required',
            'master_key' => 'required|confirmed'
        ],[
            'current_master_key.required' => 'Current Master Key field is required',
            'master_key.required' => 'Master Key field is required',
            'master_key.confirmed' => 'Master Key does not match'
        ]);

        $file = file_get_contents(Storage::path('master_key.txt'));

        if($request->current_master_key != trim($file, "\n"))
        {
            return redirect()->back()->withErrors([
                'current_master_key' => 'Invalid Master Key'
            ]);
        }

        file_put_contents(Storage::path('master_key.txt'), $request->master_key);
        return back()->with('success', 'Master key successfully updated!');
    }
}
