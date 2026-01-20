<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new
#[Layout('layouts.design-system')]
#[Title('Modals')]
class extends Component {
    public bool $showBasicModal = false;
    public bool $showHeaderModal = false;
    public bool $showFooterModal = false;
    public bool $showFullModal = false;
    public bool $showSmallModal = false;
    public bool $showLargeModal = false;
    public bool $showConfirmModal = false;
    public bool $showFormModal = false;
    public bool $showNoCloseModal = false;

    public string $formName = '';
    public string $formEmail = '';
};
?>

<div>
    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">
            Modals
        </h1>
        <p class="text-lg text-neutral-600 dark:text-neutral-400">
            Componente de modal com suporte a tamanhos, header, footer e integração com Livewire.
        </p>
    </div>

    {{-- Usage --}}
    <div class="mb-10 p-4 bg-neutral-100 dark:bg-neutral-900 rounded-lg border border-neutral-200 dark:border-neutral-800">
        <code class="text-sm text-primary">&lt;x-modal wire:model="showModal"&gt;Conteúdo&lt;/x-modal&gt;</code>
    </div>

    <div class="space-y-12">
        {{-- Basic Modal --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Modal Básico</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Modal simples controlado por Livewire.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6">
                    <x-button wire:click="$set('showBasicModal', true)">Abrir Modal</x-button>

                    <x-modal wire:model="showBasicModal">
                        <p class="text-neutral-600 dark:text-neutral-400">
                            Este é um modal básico. Clique fora ou no X para fechar.
                        </p>
                    </x-modal>
                </div>
                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>{{-- No componente --}}
public bool $showBasicModal = false;

{{-- No template --}}
&lt;x-button wire:click="$set('showBasicModal', true)"&gt;
    Abrir Modal
&lt;/x-button&gt;

&lt;x-modal wire:model="showBasicModal"&gt;
    &lt;p&gt;Conteúdo do modal&lt;/p&gt;
&lt;/x-modal&gt;</code></pre>
                </div>
            </div>
        </section>

        {{-- With Header --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Com Header</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Use o slot <code class="text-primary">header</code> para adicionar título.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6">
                    <x-button wire:click="$set('showHeaderModal', true)">Abrir com Header</x-button>

                    <x-modal wire:model="showHeaderModal">
                        <x-slot:header>
                            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">Título do Modal</h3>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-1">Descrição opcional do modal</p>
                        </x-slot:header>

                        <p class="text-neutral-600 dark:text-neutral-400">
                            Conteúdo do modal com header personalizado.
                        </p>
                    </x-modal>
                </div>
                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>&lt;x-modal wire:model="showModal"&gt;
    &lt;x-slot:header&gt;
        &lt;h3 class="text-lg font-semibold"&gt;Título&lt;/h3&gt;
        &lt;p class="text-sm text-neutral-500"&gt;Descrição&lt;/p&gt;
    &lt;/x-slot:header&gt;

    &lt;p&gt;Conteúdo&lt;/p&gt;
&lt;/x-modal&gt;</code></pre>
                </div>
            </div>
        </section>

        {{-- With Footer --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Com Footer</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Use o slot <code class="text-primary">footer</code> para ações.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6">
                    <x-button wire:click="$set('showFooterModal', true)">Abrir com Footer</x-button>

                    <x-modal wire:model="showFooterModal">
                        <x-slot:header>
                            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">Confirmar Ação</h3>
                        </x-slot:header>

                        <p class="text-neutral-600 dark:text-neutral-400">
                            Tem certeza que deseja continuar com esta ação?
                        </p>

                        <x-slot:footer>
                            <div class="flex justify-end gap-3">
                                <x-button variant="secondary" wire:click="$set('showFooterModal', false)">
                                    Cancelar
                                </x-button>
                                <x-button wire:click="$set('showFooterModal', false)">
                                    Confirmar
                                </x-button>
                            </div>
                        </x-slot:footer>
                    </x-modal>
                </div>
                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>&lt;x-modal wire:model="showModal"&gt;
    &lt;x-slot:header&gt;
        &lt;h3&gt;Confirmar Ação&lt;/h3&gt;
    &lt;/x-slot:header&gt;

    &lt;p&gt;Tem certeza?&lt;/p&gt;

    &lt;x-slot:footer&gt;
        &lt;div class="flex justify-end gap-3"&gt;
            &lt;x-button variant="secondary" wire:click="$set('showModal', false)"&gt;
                Cancelar
            &lt;/x-button&gt;
            &lt;x-button wire:click="confirm"&gt;
                Confirmar
            &lt;/x-button&gt;
        &lt;/div&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-modal&gt;</code></pre>
                </div>
            </div>
        </section>

        {{-- Sizes --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Tamanhos</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Use a prop <code class="text-primary">maxWidth</code> para alterar o tamanho.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6 flex flex-wrap gap-3">
                    <x-button variant="secondary" wire:click="$set('showSmallModal', true)">Small (sm)</x-button>
                    <x-button variant="secondary" wire:click="$set('showBasicModal', true)">Medium (md)</x-button>
                    <x-button variant="secondary" wire:click="$set('showLargeModal', true)">Large (lg)</x-button>
                    <x-button variant="secondary" wire:click="$set('showFullModal', true)">Extra Large (2xl)</x-button>

                    <x-modal wire:model="showSmallModal" maxWidth="sm">
                        <x-slot:header>
                            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">Modal Small</h3>
                        </x-slot:header>
                        <p class="text-neutral-600 dark:text-neutral-400">Este modal usa maxWidth="sm"</p>
                    </x-modal>

                    <x-modal wire:model="showLargeModal" maxWidth="lg">
                        <x-slot:header>
                            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">Modal Large</h3>
                        </x-slot:header>
                        <p class="text-neutral-600 dark:text-neutral-400">Este modal usa maxWidth="lg"</p>
                    </x-modal>

                    <x-modal wire:model="showFullModal" maxWidth="2xl">
                        <x-slot:header>
                            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">Modal Extra Large</h3>
                        </x-slot:header>
                        <p class="text-neutral-600 dark:text-neutral-400">Este modal usa maxWidth="2xl". Ideal para conteúdos maiores como tabelas ou formulários complexos.</p>
                    </x-modal>
                </div>
                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>&lt;x-modal maxWidth="sm"&gt;...&lt;/x-modal&gt;
&lt;x-modal maxWidth="md"&gt;...&lt;/x-modal&gt;  {{-- default --}}
&lt;x-modal maxWidth="lg"&gt;...&lt;/x-modal&gt;
&lt;x-modal maxWidth="xl"&gt;...&lt;/x-modal&gt;
&lt;x-modal maxWidth="2xl"&gt;...&lt;/x-modal&gt;
&lt;x-modal maxWidth="3xl"&gt;...&lt;/x-modal&gt;
&lt;x-modal maxWidth="4xl"&gt;...&lt;/x-modal&gt;
&lt;x-modal maxWidth="5xl"&gt;...&lt;/x-modal&gt;
&lt;x-modal maxWidth="full"&gt;...&lt;/x-modal&gt;</code></pre>
                </div>
            </div>
        </section>

        {{-- Confirmation Modal --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Modal de Confirmação</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Exemplo de modal para confirmar ações destrutivas.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6">
                    <x-button variant="danger" wire:click="$set('showConfirmModal', true)">
                        <x-slot:iconLeft>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </x-slot:iconLeft>
                        Excluir Item
                    </x-button>

                    <x-modal wire:model="showConfirmModal" maxWidth="sm">
                        <div class="text-center">
                            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900/30 mb-4">
                                <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-2">Excluir Item</h3>
                            <p class="text-neutral-600 dark:text-neutral-400 mb-6">
                                Tem certeza que deseja excluir este item? Esta ação não pode ser desfeita.
                            </p>
                            <div class="flex gap-3">
                                <x-button variant="secondary" :fullWidth="true" wire:click="$set('showConfirmModal', false)">
                                    Cancelar
                                </x-button>
                                <x-button variant="danger" :fullWidth="true" wire:click="$set('showConfirmModal', false)">
                                    Excluir
                                </x-button>
                            </div>
                        </div>
                    </x-modal>
                </div>
            </div>
        </section>

        {{-- Form Modal --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Modal com Formulário</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Exemplo de modal com formulário.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6">
                    <x-button wire:click="$set('showFormModal', true)">
                        <x-slot:iconLeft>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </x-slot:iconLeft>
                        Novo Usuário
                    </x-button>

                    <x-modal wire:model="showFormModal" maxWidth="lg">
                        <x-slot:header>
                            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">Criar Usuário</h3>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-1">Preencha os dados do novo usuário</p>
                        </x-slot:header>

                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Nome</label>
                                <input
                                    type="text"
                                    wire:model="formName"
                                    class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-700 rounded-lg bg-white dark:bg-neutral-800 text-neutral-900 dark:text-white placeholder-neutral-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    placeholder="Digite o nome"
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">E-mail</label>
                                <input
                                    type="email"
                                    wire:model="formEmail"
                                    class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-700 rounded-lg bg-white dark:bg-neutral-800 text-neutral-900 dark:text-white placeholder-neutral-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    placeholder="Digite o e-mail"
                                >
                            </div>
                        </form>

                        <x-slot:footer>
                            <div class="flex justify-end gap-3">
                                <x-button variant="secondary" wire:click="$set('showFormModal', false)">
                                    Cancelar
                                </x-button>
                                <x-button wire:click="$set('showFormModal', false)">
                                    Criar Usuário
                                </x-button>
                            </div>
                        </x-slot:footer>
                    </x-modal>
                </div>
            </div>
        </section>

        {{-- Non-closeable Modal --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Modal Não Fechável</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Use <code class="text-primary">:closeable="false"</code> para forçar interação.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6">
                    <x-button variant="outline" wire:click="$set('showNoCloseModal', true)">
                        Abrir Modal Obrigatório
                    </x-button>

                    <x-modal wire:model="showNoCloseModal" :closeable="false" :closeOnClickOutside="false" :closeOnEscape="false" maxWidth="sm">
                        <div class="text-center">
                            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-primary/10 dark:bg-primary/20 mb-4">
                                <svg class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-2">Ação Obrigatória</h3>
                            <p class="text-neutral-600 dark:text-neutral-400 mb-6">
                                Este modal requer que você tome uma ação para continuar.
                            </p>
                            <x-button :fullWidth="true" wire:click="$set('showNoCloseModal', false)">
                                Entendi
                            </x-button>
                        </div>
                    </x-modal>
                </div>
                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>&lt;x-modal
    wire:model="showModal"
    :closeable="false"
    :closeOnClickOutside="false"
    :closeOnEscape="false"
&gt;
    ...
&lt;/x-modal&gt;</code></pre>
                </div>
            </div>
        </section>

        {{-- Alpine.js Events --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Eventos Alpine.js</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Abra/feche modais via eventos usando a prop <code class="text-primary">name</code>.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>{{-- Modal com nome --}}
&lt;x-modal name="my-modal"&gt;
    ...
&lt;/x-modal&gt;

{{-- Abrir via evento --}}
&lt;button @click="$dispatch('open-modal', 'my-modal')"&gt;
    Abrir
&lt;/button&gt;

{{-- Fechar via evento --}}
&lt;button @click="$dispatch('close-modal', 'my-modal')"&gt;
    Fechar
&lt;/button&gt;</code></pre>
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
                            <td class="px-4 py-3 text-primary font-mono">wire:model</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">bool</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">-</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">Propriedade Livewire para controlar visibilidade</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">name</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">string|null</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">null</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">Nome para controle via eventos Alpine</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">maxWidth</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">string</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">'md'</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, full</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">closeable</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">bool</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">true</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">Exibe botão de fechar</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">closeOnClickOutside</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">bool</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">true</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">Fecha ao clicar no backdrop</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">closeOnEscape</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">bool</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">true</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">Fecha ao pressionar ESC</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">header</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">slot</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">null</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">Slot para título/header</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-primary font-mono">footer</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">slot</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">null</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">Slot para ações/footer</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
