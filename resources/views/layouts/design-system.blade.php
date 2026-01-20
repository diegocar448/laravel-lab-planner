<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data x-bind:class="$store.darkMode.on && 'dark'">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Design System' }} - {{ config('app.name') }}</title>

        {{-- Prevent flash of wrong theme --}}
        <script>
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        </script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="bg-neutral-50 dark:bg-neutral-1100 antialiased transition-colors">
        <div class="flex min-h-screen">
            {{-- Sidebar --}}
            <aside class="w-64 h-screen bg-white dark:bg-neutral-1000 border-r border-neutral-200 dark:border-neutral-900 flex flex-col shrink-0 transition-colors sticky top-0">
                {{-- Header --}}
                <div class="px-4 py-5 border-b border-neutral-100 dark:border-neutral-900">
                    <a href="/design-system" class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                            </svg>
                        </div>
                        <span class="text-lg font-bold text-neutral-900 dark:text-white">Design System</span>
                    </a>
                </div>

                {{-- Navigation --}}
                <nav class="flex-1 overflow-y-auto px-3 py-4">
                    <div class="space-y-6">
                        {{-- Foundation --}}
                        <div>
                            <h3 class="px-3 text-xs font-semibold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider mb-2">
                                Foundation
                            </h3>
                            <div class="space-y-1">
                                <x-sidebar.menu-item href="/design-system/colors">
                                    <x-slot:icon>
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                        </svg>
                                    </x-slot:icon>
                                    Colors
                                </x-sidebar.menu-item>
                                <x-sidebar.menu-item href="/design-system/typography">
                                    <x-slot:icon>
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16" />
                                        </svg>
                                    </x-slot:icon>
                                    Typography
                                </x-sidebar.menu-item>
                            </div>
                        </div>

                        {{-- Layout --}}
                        <div>
                            <h3 class="px-3 text-xs font-semibold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider mb-2">
                                Layout
                            </h3>
                            <div class="space-y-1">
                                <x-sidebar.menu-item href="/design-system/sections">
                                    <x-slot:icon>
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                        </svg>
                                    </x-slot:icon>
                                    Sections
                                </x-sidebar.menu-item>
                            </div>
                        </div>

                        {{-- Components --}}
                        <div>
                            <h3 class="px-3 text-xs font-semibold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider mb-2">
                                Components
                            </h3>
                            <div class="space-y-1">
                                <x-sidebar.menu-item href="/design-system/buttons">
                                    <x-slot:icon>
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                        </svg>
                                    </x-slot:icon>
                                    Buttons
                                </x-sidebar.menu-item>
                                <x-sidebar.menu-item href="/design-system/inputs">
                                    <x-slot:icon>
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </x-slot:icon>
                                    Inputs
                                </x-sidebar.menu-item>
                                <x-sidebar.menu-item href="/design-system/cards">
                                    <x-slot:icon>
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </x-slot:icon>
                                    Cards
                                </x-sidebar.menu-item>
                                <x-sidebar.menu-item href="/design-system/modals">
                                    <x-slot:icon>
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                    </x-slot:icon>
                                    Modals
                                </x-sidebar.menu-item>
                                <x-sidebar.menu-item href="/design-system/alerts">
                                    <x-slot:icon>
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </x-slot:icon>
                                    Alerts
                                </x-sidebar.menu-item>
                                <x-sidebar.menu-item href="/design-system/tables">
                                    <x-slot:icon>
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                    </x-slot:icon>
                                    Tables
                                </x-sidebar.menu-item>
                            </div>
                        </div>
                    </div>
                </nav>

                {{-- Footer --}}
                <div class="border-t border-neutral-100 dark:border-neutral-900 px-3 py-3">
                    <div class="flex items-center justify-between">
                        <a href="/" class="text-sm text-neutral-600 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-white transition-colors">
                            &larr; Voltar ao App
                        </a>
                        <x-theme-toggle />
                    </div>
                </div>
            </aside>

            {{-- Main Content --}}
            <main class="flex-1 overflow-auto">
                <div class="max-w-5xl mx-auto px-8 py-10">
                    {{ $slot }}
                </div>
            </main>
        </div>

        {{-- Alpine.js Dark Mode Store --}}
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('darkMode', {
                    on: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
                    toggle() {
                        this.on = !this.on;
                        localStorage.theme = this.on ? 'dark' : 'light';
                    }
                });
            });
        </script>

        @livewireScripts
    </body>
</html>
