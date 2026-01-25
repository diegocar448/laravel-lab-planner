<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data x-bind:class="$store.darkMode.on && 'dark'">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

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
            <x-sidebar>
                <x-slot:header>
                    <a href="/" class="flex items-center gap-2">
                        <span class="text-xl font-bold text-neutral-900 dark:text-white">{{ config('app.name') }}</span>
                    </a>
                </x-slot:header>

                {{-- Menu Items --}}
                @isset($sidebar)
                    {{ $sidebar }}
                @else
                    <x-sidebar.menu-item href="{{ route('home') }}">
                        <x-slot:icon>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </x-slot:icon>
                        Home
                    </x-sidebar.menu-item>

                    <x-sidebar.menu-item href="{{ route('kanban') }}">
                        <x-slot:icon>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                            </svg>
                        </x-slot:icon>
                        Kanban
                    </x-sidebar.menu-item>

                    @auth
                        @if(auth()->user()->goals->count() > 0)
                            <div class="pt-4 pb-2 px-3">
                                <span class="text-xs font-semibold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Minhas Metas</span>
                            </div>
                            @foreach(auth()->user()->goals as $goal)
                                <x-sidebar.menu-item href="{{ route('goals.index', $goal) }}">
                                    <x-slot:icon>
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </x-slot:icon>
                                    {{ Str::limit($goal->name, 20) }}
                                </x-sidebar.menu-item>
                            @endforeach
                        @endif
                    @endauth
                @endisset

                <x-slot:footer>
                    <x-sidebar.user-menu />
                </x-slot:footer>
            </x-sidebar>

            {{-- Main Content --}}
            <main class="flex-1 overflow-auto">
                {{ $slot }}
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
                    },
                    setLight() {
                        this.on = false;
                        localStorage.theme = 'light';
                    },
                    setDark() {
                        this.on = true;
                        localStorage.theme = 'dark';
                    },
                    setSystem() {
                        this.on = window.matchMedia('(prefers-color-scheme: dark)').matches;
                        localStorage.removeItem('theme');
                    }
                });
            });
        </script>

        @livewireScripts
    </body>
</html>
