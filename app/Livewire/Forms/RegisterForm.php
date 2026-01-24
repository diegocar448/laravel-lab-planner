<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|min:3|max:255|unique:users,phone',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                ->letters()
                ->numbers()
                ->symbols()
                ->mixedCase()
                ->uncompromised()
            ]
        ];
    }

    public function store(): User
    {
        $this->validate();
        $user = User::create($this->all());

        return $user;
    }
}
