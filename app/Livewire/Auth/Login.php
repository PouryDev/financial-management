<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Traits\HasAlert;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    use HasAlert;

    #[Validate('required|email')]
    public ?string $email = '';
    #[Validate('required|string|min:8|max:16')]
    public ?string $password = '';

    public function login(): void
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();
        if (empty($user)) {
            $this->showAlert('Email or password is invalid', 'error');
            return;
        }

        if (!Hash::check($this->password, $user->password)) {
            $this->showAlert('Email or password is invalid', 'error');
            return;
        }

        Auth::login($user);

        $this->showAlert('Login was successful', 'success');
    }

    public function alert(string $title): void
    {
        $this->showAlert($title, 'success');
    }

    public function render(): View
    {
        return view('livewire.auth.login')
            ->layout('livewire.layouts.auth');
    }
}
