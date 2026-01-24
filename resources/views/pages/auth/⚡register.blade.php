<?php

use App\Livewire\Forms\RegisterForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Layout('layouts.auth')]
#[Title('Criar Conta')]
class extends Component {
    public RegisterForm $form;

    public function register()
    {
        $user = $this->form->store();

        if ($user) {
            auth()->login($user);

            session()->regenerate();
            $this->redirect(
                route('home'),
                navigate: true
            );
        }
    }

};
?>

<div>
    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">
            Criar sua conta
        </h1>
        <p class="text-neutral-600 dark:text-neutral-400">
            Preencha os dados abaixo para começar.
        </p>
    </div>

    {{-- Success Message --}}
    @if (session()->has('message'))
        <div class="mb-6">
            <x-alert variant="success" :dismissible="true">
                {{ session('message') }}
            </x-alert>
        </div>
    @endif

    {{-- Register Form --}}
    <form wire:submit="register" class="space-y-5">
        {{-- Name --}}
        <div>
            <x-form.label for="name" required>Nome completo</x-form.label>
            <x-form.input
                id="name"
                type="text"
                wire:model="form.name"
                name="form.name"
                placeholder="João Silva"
                required
                autofocus
            />
        </div>

        {{-- Email --}}
        <div>
            <x-form.label for="email" required>Email</x-form.label>
            <x-form.input
                id="email"
                type="email"
                wire:model="form.email"
                name="form.email"
                placeholder="seu@email.com"
                required
            />
        </div>

        <div>
            <x-form.label for="phone" required>Telefone</x-form.label>
            <x-form.input
                id="phone"
                type="tel"
                wire:model="form.phone"
                name="form.phone"
                placeholder="(99) 99999-9999"
                x-mask="(99) 99999-9999"
                required
            />
        </div>

        {{-- Password --}}
        <div>
            <x-form.label for="password" required>Senha</x-form.label>
            <x-form.input
                id="password"
                type="password"
                wire:model="form.password"
                name="form.password"
                placeholder="••••••••"
                required
            />
            <x-form.hint>Mínimo de 8 caracteres</x-form.hint>
        </div>

        {{-- Password Confirmation --}}
        <div>
            <x-form.label for="password_confirmation" required>Confirmar senha</x-form.label>
            <x-form.input
                id="password_confirmation"
                type="password"
                wire:model="form.password_confirmation"
                name="form.password_confirmation"
                placeholder="••••••••"
                required
            />
        </div>

        {{-- Terms --}}
        <div class="flex items-start">
            <div class="flex items-center h-5">
                <x-form.checkbox
                        id="terms"
                        wire:model="terms"
                        required
                />
            </div>
            <div class="ml-2">
                <x-form.label for="terms" class="mb-0">
                    <span class="text-sm text-neutral-600 dark:text-neutral-400">
                        Eu concordo com os
                        <a href="/terms" class="text-primary hover:underline">Termos de Serviço</a>
                        e
                        <a href="/privacy" class="text-primary hover:underline">Política de Privacidade</a>
                    </span>
                </x-form.label>
                <x-form.error name="terms"/>
            </div>
        </div>

        {{-- Submit Button --}}
        <div>
            <x-button type="submit" variant="primary" size="lg" fullWidth>
                Criar conta
            </x-button>
        </div>
    </form>

    {{-- Divider --}}
    <div class="relative my-6">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-neutral-300 dark:border-neutral-700"></div>
        </div>
        <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-neutral-50 dark:bg-neutral-1100 text-neutral-500 dark:text-neutral-400">
                Ou cadastre-se com
            </span>
        </div>
    </div>

    {{-- Sign In Link --}}
    <div class="mt-8 text-center">
        <p class="text-sm text-neutral-600 dark:text-neutral-400">
            Já tem uma conta?
            <a href="/login" class="font-medium text-primary hover:underline" wire:navigate>
                Entrar
            </a>
        </p>
    </div>
</div>
