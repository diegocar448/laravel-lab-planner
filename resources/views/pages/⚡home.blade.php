<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new
#[Title('Home')]
class extends Component
{
    public bool $showGoalModal = false;
};
?>

<div class="p-8">
    <div class="max-w-4xl">
        <div class="flex items-center justify-between mb-2">
            <h1 class="text-3xl font-bold text-neutral-900 dark:text-white">
                Bem-vindo ao {{ config('app.name') }}
            </h1>
            <x-theme-toggle/>
        </div>
        <p class="text-neutral-600 dark:text-neutral-400 mb-8">
            Este é o layout da área logada com menu lateral.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div
                class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 transition-colors">
                <div
                    class="w-10 h-10 rounded-lg bg-primary-lighter dark:bg-primary/20 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-1">Dashboard</h3>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">Visualize métricas e estatísticas.</p>
            </div>

            <div
                class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 transition-colors">
                <div
                    class="w-10 h-10 rounded-lg bg-primary-lighter dark:bg-primary/20 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-1">Usuários</h3>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">Gerencie usuários do sistema.</p>
            </div>

            <a href="/design-system"
               class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 transition-colors hover:border-primary dark:hover:border-primary group">
                <div
                    class="w-10 h-10 rounded-lg bg-primary-lighter dark:bg-primary/20 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-1 group-hover:text-primary transition-colors">
                    Design System</h3>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">Veja todos os componentes.</p>
            </a>
        </div>

    </div>
</div>
