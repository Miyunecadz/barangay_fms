<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username;
    public $password;
    public $errorCredential;

    public function authenticateUser()
    {
        $credentials = ['username' => $this->username, 'password' => $this->password];

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            if(Auth::user()->role === 'bhw'){
                return redirect()->to(route('resident.index'));
            }

            return redirect()->to(route('dashboard'));
        }

        $this->password = "";
        return $this->errorCredential = "Invalid Credentials";
    }

    public function render()
    {
        return view('livewire.login')
                ->extends('layouts.guest');
    }
}
