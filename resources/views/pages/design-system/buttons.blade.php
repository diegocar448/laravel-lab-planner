<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new
#[Layout('layouts.design-system')]
#[Title('Buttons')]
class extends Component {
    public bool $isLoading = false;

    public function toggleLoading(): void
    {
        $this->isLoading = !$this->isLoading;
    }
};
?>

<div>
    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">
            Buttons
        </h1>
        <p class="text-lg text-neutral-600 dark:text-neutral-400">
            Componente de botão com suporte a variantes, tamanhos, ícones e estados.
        </p>
    </div>

    {{-- Usage --}}
    <div class="mb-10 p-4 bg-neutral-100 dark:bg-neutral-900 rounded-lg border border-neutral-200 dark:border-neutral-800">
        <code class="text-sm text-primary">&lt;x-button&gt;Label&lt;/x-button&gt;</code>
    </div>

    <div class="space-y-12">
        {{-- Variants --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Variantes</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Use a prop <code class="text-primary">variant</code> para alterar o estilo do botão.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6 flex flex-wrap gap-3">
                    <x-button variant="primary">Primary</x-button>
                    <x-button variant="secondary">Secondary</x-button>
                    <x-button variant="tertiary">Tertiary</x-button>
                    <x-button variant="outline">Outline</x-button>
                    <x-button variant="ghost">Ghost</x-button>
                    <x-button variant="danger">Danger</x-button>
                </div>
                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>&lt;x-button variant="primary"&gt;Primary&lt;/x-button&gt;
&lt;x-button variant="secondary"&gt;Secondary&lt;/x-button&gt;
&lt;x-button variant="tertiary"&gt;Tertiary&lt;/x-button&gt;
&lt;x-button variant="outline"&gt;Outline&lt;/x-button&gt;
&lt;x-button variant="ghost"&gt;Ghost&lt;/x-button&gt;
&lt;x-button variant="danger"&gt;Danger&lt;/x-button&gt;</code></pre>
                </div>
            </div>
        </section>

        {{-- Sizes --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Tamanhos</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Use a prop <code class="text-primary">size</code> para alterar o tamanho.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6 flex flex-wrap items-center gap-3">
                    <x-button size="xs">Extra Small</x-button>
                    <x-button size="sm">Small</x-button>
                    <x-button size="md">Medium</x-button>
                    <x-button size="lg">Large</x-button>
                    <x-button size="xl">Extra Large</x-button>
                </div>
                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>&lt;x-button size="xs"&gt;Extra Small&lt;/x-button&gt;
&lt;x-button size="sm"&gt;Small&lt;/x-button&gt;
&lt;x-button size="md"&gt;Medium&lt;/x-button&gt;
&lt;x-button size="lg"&gt;Large&lt;/x-button&gt;
&lt;x-button size="xl"&gt;Extra Large&lt;/x-button&gt;</code></pre>
                </div>
            </div>
        </section>

        {{-- With Icons --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Com Ícones</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Use os slots <code class="text-primary">iconLeft</code> e <code class="text-primary">iconRight</code> para adicionar ícones.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6 flex flex-wrap gap-3">
                    <x-button>
                        <x-slot:iconLeft>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </x-slot:iconLeft>
                        Adicionar
                    </x-button>

                    <x-button variant="secondary">
                        Próximo
                        <x-slot:iconRight>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </x-slot:iconRight>
                    </x-button>

                    <x-button variant="outline">
                        <x-slot:iconLeft>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                        </x-slot:iconLeft>
                        Upload
                    </x-button>

                    <x-button variant="danger">
                        <x-slot:iconLeft>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </x-slot:iconLeft>
                        Excluir
                    </x-button>
                </div>
                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>&lt;x-button&gt;
    &lt;x-slot:iconLeft&gt;
        &lt;svg&gt;...&lt;/svg&gt;
    &lt;/x-slot:iconLeft&gt;
    Adicionar
&lt;/x-button&gt;

&lt;x-button&gt;
    Próximo
    &lt;x-slot:iconRight&gt;
        &lt;svg&gt;...&lt;/svg&gt;
    &lt;/x-slot:iconRight&gt;
&lt;/x-button&gt;</code></pre>
                </div>
            </div>
        </section>

        {{-- States --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Estados</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Use as props <code class="text-primary">loading</code> e <code class="text-primary">disabled</code> para estados especiais.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6 space-y-4">
                    <div class="flex flex-wrap gap-3">
                        <x-button :loading="true">Carregando</x-button>
                        <x-button variant="secondary" :loading="true">Salvando</x-button>
                        <x-button variant="outline" :loading="true">Processando</x-button>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <x-button :disabled="true">Desabilitado</x-button>
                        <x-button variant="secondary" :disabled="true">Desabilitado</x-button>
                        <x-button variant="outline" :disabled="true">Desabilitado</x-button>
                    </div>
                </div>
                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>&lt;x-button :loading="true"&gt;Carregando&lt;/x-button&gt;
&lt;x-button :disabled="true"&gt;Desabilitado&lt;/x-button&gt;</code></pre>
                </div>
            </div>
        </section>

        {{-- Interactive Loading --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Loading Interativo</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Exemplo com Livewire para loading dinâmico.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6 flex flex-wrap gap-3">
                    <x-button wire:click="toggleLoading" :loading="$isLoading">
                        {{ $isLoading ? 'Clique para parar' : 'Clique para loading' }}
                    </x-button>
                </div>
                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>{{-- No componente Livewire --}}
public bool $isLoading = false;

public function save(): void
{
    $this->isLoading = true;
    // ... operação
    $this->isLoading = false;
}

{{-- No template --}}
&lt;x-button wire:click="save" :loading="$isLoading"&gt;
    Salvar
&lt;/x-button&gt;</code></pre>
                </div>
            </div>
        </section>

        {{-- As Link --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Como Link</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Use a prop <code class="text-primary">href</code> para renderizar como <code class="text-primary">&lt;a&gt;</code>.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6 flex flex-wrap gap-3">
                    <x-button href="/design-system">Link Interno</x-button>
                    <x-button href="/design-system" variant="secondary">Secondary Link</x-button>
                    <x-button href="/design-system" variant="ghost">
                        <x-slot:iconLeft>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </x-slot:iconLeft>
                        Link com Ícone
                    </x-button>
                </div>
                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>&lt;x-button href="/dashboard"&gt;Ir para Dashboard&lt;/x-button&gt;
&lt;x-button href="https://example.com" target="_blank"&gt;Link Externo&lt;/x-button&gt;</code></pre>
                </div>
            </div>
        </section>

        {{-- Full Width --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Full Width</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Use a prop <code class="text-primary">fullWidth</code> para ocupar toda a largura.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6 space-y-3 max-w-md">
                    <x-button :fullWidth="true">Botão Full Width</x-button>
                    <x-button variant="secondary" :fullWidth="true">Secondary Full Width</x-button>
                    <x-button variant="outline" :fullWidth="true">Outline Full Width</x-button>
                </div>
                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>&lt;x-button :fullWidth="true"&gt;Full Width&lt;/x-button&gt;</code></pre>
                </div>
            </div>
        </section>

        {{-- Props Reference --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4">Referência de Props</h2>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-neutral-50 dark:bg-neutral-950">
                        <tr>
                            <th class="text-left px-4 py-3 font-semibold text-neutral-900 dark:text-white">Prop</th>
                            <th class="text-left px-4 py-3 font-semibold text-neutral-900 dark:text-white">Tipo</th>
                            <th class="text-left px-4 py-3 font-semibold text-neutral-900 dark:text-white">Default</th>
                            <th class="text-left px-4 py-3 font-semibold text-neutral-900 dark:text-white">Descrição</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-800">
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">variant</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">string</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">'primary'</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">primary, secondary, tertiary, outline, ghost, danger</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">size</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">string</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">'md'</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">xs, sm, md, lg, xl</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">type</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">string</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">'button'</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">button, submit, reset</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">href</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">string|null</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">null</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">Renderiza como &lt;a&gt;</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">disabled</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">bool</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">false</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">Estado desabilitado</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">loading</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">bool</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">false</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">Exibe spinner de loading</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">fullWidth</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">bool</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">false</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">Largura 100%</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">iconLeft</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">slot</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">null</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">Ícone à esquerda</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">iconRight</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">slot</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">null</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">Ícone à direita</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
