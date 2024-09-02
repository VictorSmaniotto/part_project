<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class AuthForm extends Component
{
    public $isRegister = false;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function toggleForm()
    {
        $this->isRegister = !$this->isRegister;
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->intended('/');
        } else {
            session()->flash('error', 'Credenciais inválidas.');
        }
    }

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth-form');
    }
}
