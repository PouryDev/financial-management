<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Traits\HasAlert;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    use HasAlert;

    #[Validate('required|string|min:1')]
     public ?string $name = '';
    #[Validate('required|email')]
    public ?string $email = '';
    #[Validate('required|string|min:8|max:16')]
    public ?string $password = '';
    #[Validate('required|string|min:8|max:16')]
    public ?string $confirmPassword = '';

    public function register(): void
    {
        $this->validate();

        if ($this->password !== $this->confirmPassword) {
            $this->showAlert('Passwords are not similar', 'error');
            return;
        }

        $exists = User::where('email', $this->email)->exists();
        if ($exists) {
            $this->showAlert('Email has been used before', 'error');
            return;
        }

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => $this->password,
        ]);
        if (empty($user)) {
            $this->showAlert('Something went wrong please try again later', 'error');
            return;
        }

        Auth::login($user);
        $this->showAlert('You have been registered successfully', 'success');
     }

    public function render(): View
    {
        return view('livewire.auth.register')
            ->layout('livewire.layouts.auth');
    }
}
