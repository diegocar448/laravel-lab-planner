<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new
#[Layout('layouts.design-system')]
#[Title('Overview')]
class extends Component {
    //
};
?>

<div>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">
            Design System
        </h1>
        <p class="text-lg text-neutral-600 dark:text-neutral-400">
            Biblioteca de componentes e padrões visuais do {{ config('app.name') }}.
        </p>
    </div>

    {{-- Quick Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6">
            <div class="text-3xl font-bold text-primary mb-1">21</div>
            <div class="text-sm text-neutral-600 dark:text-neutral-400">Cores do Sistema</div>
        </div>
        <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6">
            <div class="text-3xl font-bold text-primary mb-1">6</div>
            <div class="text-sm text-neutral-600 dark:text-neutral-400">Variantes de Botão</div>
        </div>
        <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6">
            <div class="text-3xl font-bold text-primary mb-1">5</div>
            <div class="text-sm text-neutral-600 dark:text-neutral-400">Tamanhos Padrão</div>
        </div>
    </div>

    {{-- Foundation --}}
    <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4">Foundation</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <a href="/design-system/colors" class="group bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 hover:border-primary dark:hover:border-primary transition-colors">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-lg bg-primary/10 dark:bg-primary/20 flex items-center justify-center text-primary">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-neutral-900 dark:text-white group-hover:text-primary transition-colors">Colors</h3>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400">Primary, Neutral, Overlay</p>
                </div>
            </div>
            <div class="flex gap-1">
                <div class="w-8 h-8 rounded bg-primary"></div>
                <div class="w-8 h-8 rounded bg-primary-light"></div>
                <div class="w-8 h-8 rounded bg-neutral-900 dark:bg-neutral-100"></div>
                <div class="w-8 h-8 rounded bg-neutral-700 dark:bg-neutral-300"></div>
                <div class="w-8 h-8 rounded bg-neutral-500"></div>
                <div class="w-8 h-8 rounded bg-neutral-300 dark:bg-neutral-700"></div>
                <div class="w-8 h-8 rounded bg-neutral-100 dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-700"></div>
            </div>
        </a>

        <a href="/design-system/typography" class="group bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 hover:border-primary dark:hover:border-primary transition-colors opacity-50 pointer-events-none">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-lg bg-neutral-100 dark:bg-neutral-800 flex items-center justify-center text-neutral-400">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-neutral-900 dark:text-white">Typography</h3>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400">Em breve</p>
                </div>
            </div>
            <div class="h-8 bg-neutral-100 dark:bg-neutral-800 rounded animate-pulse"></div>
        </a>
    </div>

    {{-- Components Grid --}}
    <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4">Components</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="/design-system/buttons" class="group bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 hover:border-primary dark:hover:border-primary transition-colors">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-lg bg-primary/10 dark:bg-primary/20 flex items-center justify-center text-primary">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-neutral-900 dark:text-white group-hover:text-primary transition-colors">Buttons</h3>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400">6 variantes, 5 tamanhos</p>
                </div>
            </div>
            <div class="flex gap-2">
                <span class="px-3 py-1.5 bg-primary text-white text-xs font-medium rounded">Primary</span>
                <span class="px-3 py-1.5 bg-neutral-100 dark:bg-neutral-800 text-neutral-900 dark:text-white text-xs font-medium rounded">Secondary</span>
                <span class="px-3 py-1.5 text-neutral-700 dark:text-neutral-300 text-xs font-medium rounded">Tertiary</span>
            </div>
        </a>

        <a href="/design-system/inputs" class="group bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 hover:border-primary dark:hover:border-primary transition-colors opacity-50 pointer-events-none">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-lg bg-neutral-100 dark:bg-neutral-800 flex items-center justify-center text-neutral-400">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-neutral-900 dark:text-white">Inputs</h3>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400">Em breve</p>
                </div>
            </div>
            <div class="h-9 bg-neutral-100 dark:bg-neutral-800 rounded animate-pulse"></div>
        </a>

        <a href="/design-system/cards" class="group bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 hover:border-primary dark:hover:border-primary transition-colors opacity-50 pointer-events-none">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-lg bg-neutral-100 dark:bg-neutral-800 flex items-center justify-center text-neutral-400">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-neutral-900 dark:text-white">Cards</h3>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400">Em breve</p>
                </div>
            </div>
            <div class="h-9 bg-neutral-100 dark:bg-neutral-800 rounded animate-pulse"></div>
        </a>

        <a href="/design-system/modals" class="group bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 hover:border-primary dark:hover:border-primary transition-colors">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-lg bg-primary/10 dark:bg-primary/20 flex items-center justify-center text-primary">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-neutral-900 dark:text-white group-hover:text-primary transition-colors">Modals</h3>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400">9 tamanhos, slots flexíveis</p>
                </div>
            </div>
            <div class="flex gap-2">
                <span class="px-3 py-1.5 bg-neutral-100 dark:bg-neutral-800 text-neutral-700 dark:text-neutral-300 text-xs font-medium rounded">Header</span>
                <span class="px-3 py-1.5 bg-neutral-100 dark:bg-neutral-800 text-neutral-700 dark:text-neutral-300 text-xs font-medium rounded">Footer</span>
                <span class="px-3 py-1.5 bg-neutral-100 dark:bg-neutral-800 text-neutral-700 dark:text-neutral-300 text-xs font-medium rounded">Closeable</span>
            </div>
        </a>
    </div>
</div>
