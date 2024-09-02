<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Login extends Component
{
    public $email, $password;

    protected $rules = [
        "email"=> "required|email",
        "password"=> "required"
    ];

    public function login()
    {
        $this->validate();

        if(Auth::attempt(['email' => $this->email,'password'=> $this->password])) {
            return redirect()->intended(route('dashboard'));
        } else{
            session()->flash('error','Credenciais inválidas.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
