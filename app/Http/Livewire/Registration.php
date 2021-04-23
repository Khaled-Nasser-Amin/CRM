<?php

namespace App\Http\Livewire;

use App\Mail\RegisterationEmail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class Registration extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public function updated($fields){
        $this->validateOnly($fields,[
            'email' => 'required|email|unique:users,email|max:255',
            'name' => 'required|string|max:255',
            'password' => 'required|alpha_dash|max:255|min:8',
            'password_confirmation' => 'required|alpha_dash|min:8|max:255',

        ]);
    }

    public function store(){
        $this->validate([
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|alpha_dash|max:255|confirmed|min:8',
            'password_confirmation' => 'required|alpha_dash|min:8|max:255',
            'name' => 'required|string|max:255',
        ]);

       $user= User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
       $key=Str::random();
       session()->put('email',$user->email);
       session()->put('key',$key);
       Mail::to($user)->send(new RegisterationEmail($user->name,env('APP_URL').'/activeAccount/'.csrf_token().$key));
       return $this->redirect('check_your_inbox');
    }
    public function render()
    {
        return view('livewire.registration')->extends('layouts.app');
    }
}
