<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new
#[Layout('layouts.design-system')]
#[Title('Tables')]
class extends Component
{
    use WithPagination;

    public string $sortField = 'name';

    public string $sortDirection = 'asc';

    public function sortBy(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }

        $this->resetPage();
    }

    public function getData()
    {
        $data = collect([
            ['id' => 1, 'name' => 'João Silva', 'email' => 'joao@exemplo.com', 'role' => 'Admin', 'status' => 'active'],
            ['id' => 2, 'name' => 'Maria Santos', 'email' => 'maria@exemplo.com', 'role' => 'Editor', 'status' => 'active'],
            ['id' => 3, 'name' => 'Pedro Costa', 'email' => 'pedro@exemplo.com', 'role' => 'User', 'status' => 'inactive'],
            ['id' => 4, 'name' => 'Ana Lima', 'email' => 'ana@exemplo.com', 'role' => 'Admin', 'status' => 'active'],
            ['id' => 5, 'name' => 'Carlos Oliveira', 'email' => 'carlos@exemplo.com', 'role' => 'Editor', 'status' => 'active'],
            ['id' => 6, 'name' => 'Beatriz Ferreira', 'email' => 'beatriz@exemplo.com', 'role' => 'User', 'status' => 'inactive'],
            ['id' => 7, 'name' => 'Ricardo Alves', 'email' => 'ricardo@exemplo.com', 'role' => 'Editor', 'status' => 'active'],
            ['id' => 8, 'name' => 'Juliana Rocha', 'email' => 'juliana@exemplo.com', 'role' => 'Admin', 'status' => 'active'],
            ['id' => 9, 'name' => 'Fernando Dias', 'email' => 'fernando@exemplo.com', 'role' => 'User', 'status' => 'inactive'],
            ['id' => 10, 'name' => 'Camila Mendes', 'email' => 'camila@exemplo.com', 'role' => 'Editor', 'status' => 'active'],
            ['id' => 11, 'name' => 'Lucas Martins', 'email' => 'lucas@exemplo.com', 'role' => 'User', 'status' => 'active'],
            ['id' => 12, 'name' => 'Patricia Souza', 'email' => 'patricia@exemplo.com', 'role' => 'Admin', 'status' => 'active'],
        ]);

        $sorted = $data->sortBy($this->sortField, SORT_REGULAR, $this->sortDirection === 'desc');

        return new \Illuminate\Pagination\LengthAwarePaginator(
            $sorted->forPage($this->getPage(), 5)->values(),
            $sorted->count(),
            5,
            $this->getPage(),
            ['path' => request()->url()]
        );
    }
};
?>

<div>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">Tables</h1>
        <p class="text-neutral-600 dark:text-neutral-400">Componentes para exibir dados tabulares com ordenação e paginação</p>
    </div>

    <!-- Basic Table -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Tabela Básica</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Estrutura básica de uma tabela com cabeçalhos e células.
        </p>

        <x-card padding="none">
            <x-table>
                <x-table.head>
                    <x-table.row>
                        <x-table.header>Nome</x-table.header>
                        <x-table.header>Email</x-table.header>
                        <x-table.header>Função</x-table.header>
                        <x-table.header align="center">Status</x-table.header>
                    </x-table.row>
                </x-table.head>
                <x-table.body>
                    <x-table.row>
                        <x-table.cell>João Silva</x-table.cell>
                        <x-table.cell>joao@exemplo.com</x-table.cell>
                        <x-table.cell>Admin</x-table.cell>
                        <x-table.cell align="center">
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                Ativo
                            </span>
                        </x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell>Maria Santos</x-table.cell>
                        <x-table.cell>maria@exemplo.com</x-table.cell>
                        <x-table.cell>Editor</x-table.cell>
                        <x-table.cell align="center">
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                Ativo
                            </span>
                        </x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell>Pedro Costa</x-table.cell>
                        <x-table.cell>pedro@exemplo.com</x-table.cell>
                        <x-table.cell>User</x-table.cell>
                        <x-table.cell align="center">
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-neutral-100 text-neutral-800 dark:bg-neutral-800 dark:text-neutral-200">
                                Inativo
                            </span>
                        </x-table.cell>
                    </x-table.row>
                </x-table.body>
            </x-table>
        </x-card>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-table&gt;
    &lt;x-table.head&gt;
        &lt;x-table.row&gt;
            &lt;x-table.header&gt;Nome&lt;/x-table.header&gt;
            &lt;x-table.header&gt;Email&lt;/x-table.header&gt;
        &lt;/x-table.row&gt;
    &lt;/x-table.head&gt;
    &lt;x-table.body&gt;
        &lt;x-table.row&gt;
            &lt;x-table.cell&gt;João Silva&lt;/x-table.cell&gt;
            &lt;x-table.cell&gt;joao@exemplo.com&lt;/x-table.cell&gt;
        &lt;/x-table.row&gt;
    &lt;/x-table.body&gt;
&lt;/x-table&gt;</code></pre>
        </div>
    </section>

    <!-- Table with Sorting and Pagination -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Tabela com Ordenação e Paginação</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Exemplo interativo com ordenação por colunas e paginação.
        </p>

        <x-card padding="none">
            <x-table>
                <x-table.head>
                    <x-table.row>
                        <x-table.header
                            :sortable="true"
                            :sorted="$sortField === 'name' ? $sortDirection : null"
                            wire:click="sortBy('name')"
                        >
                            Nome
                        </x-table.header>
                        <x-table.header
                            :sortable="true"
                            :sorted="$sortField === 'email' ? $sortDirection : null"
                            wire:click="sortBy('email')"
                        >
                            Email
                        </x-table.header>
                        <x-table.header
                            :sortable="true"
                            :sorted="$sortField === 'role' ? $sortDirection : null"
                            wire:click="sortBy('role')"
                        >
                            Função
                        </x-table.header>
                        <x-table.header
                            align="center"
                            :sortable="true"
                            :sorted="$sortField === 'status' ? $sortDirection : null"
                            wire:click="sortBy('status')"
                        >
                            Status
                        </x-table.header>
                        <x-table.header align="right">Ações</x-table.header>
                    </x-table.row>
                </x-table.head>
                <x-table.body>
                    @foreach ($this->getData() as $user)
                        <x-table.row wire:key="user-{{ $user['id'] }}">
                            <x-table.cell>
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center">
                                        <span class="text-sm font-medium text-primary-700 dark:text-primary-300">
                                            {{ substr($user['name'], 0, 1) }}
                                        </span>
                                    </div>
                                    <span class="font-medium">{{ $user['name'] }}</span>
                                </div>
                            </x-table.cell>
                            <x-table.cell>{{ $user['email'] }}</x-table.cell>
                            <x-table.cell>
                                <span class="text-neutral-600 dark:text-neutral-400">{{ $user['role'] }}</span>
                            </x-table.cell>
                            <x-table.cell align="center">
                                @if ($user['status'] === 'active')
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        Ativo
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-neutral-100 text-neutral-800 dark:bg-neutral-800 dark:text-neutral-200">
                                        Inativo
                                    </span>
                                @endif
                            </x-table.cell>
                            <x-table.cell align="right">
                                <div class="flex items-center justify-end gap-2">
                                    <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-table.body>
            </x-table>

            <div class="px-6 py-4 border-t border-neutral-200 dark:border-neutral-700">
                {{ $this->getData()->links() }}
            </div>
        </x-card>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-table.header
    :sortable="true"
    :sorted="$sortField === 'name' ? $sortDirection : null"
    wire:click="sortBy('name')"
&gt;
    Nome
&lt;/x-table.header&gt;</code></pre>
        </div>
    </section>

    <!-- Table Variants -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Alinhamento de Colunas</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Controle o alinhamento de cabeçalhos e células.
        </p>

        <x-card padding="none">
            <x-table>
                <x-table.head>
                    <x-table.row>
                        <x-table.header>Produto</x-table.header>
                        <x-table.header align="center">Quantidade</x-table.header>
                        <x-table.header align="right">Preço</x-table.header>
                        <x-table.header align="right">Total</x-table.header>
                    </x-table.row>
                </x-table.head>
                <x-table.body>
                    <x-table.row>
                        <x-table.cell>Produto A</x-table.cell>
                        <x-table.cell align="center">10</x-table.cell>
                        <x-table.cell align="right">R$ 50,00</x-table.cell>
                        <x-table.cell align="right" class="font-semibold">R$ 500,00</x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell>Produto B</x-table.cell>
                        <x-table.cell align="center">5</x-table.cell>
                        <x-table.cell align="right">R$ 100,00</x-table.cell>
                        <x-table.cell align="right" class="font-semibold">R$ 500,00</x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell>Produto C</x-table.cell>
                        <x-table.cell align="center">3</x-table.cell>
                        <x-table.cell align="right">R$ 200,00</x-table.cell>
                        <x-table.cell align="right" class="font-semibold">R$ 600,00</x-table.cell>
                    </x-table.row>
                </x-table.body>
            </x-table>
        </x-card>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-table.header align="left"&gt;Texto&lt;/x-table.header&gt;
&lt;x-table.header align="center"&gt;Centro&lt;/x-table.header&gt;
&lt;x-table.header align="right"&gt;Direita&lt;/x-table.header&gt;

&lt;x-table.cell align="right"&gt;R$ 100,00&lt;/x-table.cell&gt;</code></pre>
        </div>
    </section>

    <!-- Empty State -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Estado Vazio</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Como exibir quando não há dados na tabela.
        </p>

        <x-card padding="none">
            <x-table>
                <x-table.head>
                    <x-table.row>
                        <x-table.header>Nome</x-table.header>
                        <x-table.header>Email</x-table.header>
                        <x-table.header>Função</x-table.header>
                    </x-table.row>
                </x-table.head>
                <x-table.body>
                    <x-table.row :hoverable="false">
                        <x-table.cell colspan="3">
                            <div class="py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-neutral-900 dark:text-white">Nenhum registro encontrado</h3>
                                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Comece criando um novo registro.</p>
                                <div class="mt-6">
                                    <x-button size="sm">Criar Novo</x-button>
                                </div>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                </x-table.body>
            </x-table>
        </x-card>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-table&gt;
    &lt;x-table.head&gt;
        &lt;x-table.row&gt;
            &lt;x-table.header&gt;Nome&lt;/x-table.header&gt;
            &lt;x-table.header&gt;Email&lt;/x-table.header&gt;
            &lt;x-table.header&gt;Função&lt;/x-table.header&gt;
        &lt;/x-table.row&gt;
    &lt;/x-table.head&gt;
    &lt;x-table.body&gt;
        &lt;x-table.row :hoverable="false"&gt;
            &lt;x-table.cell colspan="3"&gt;
                &lt;div class="py-12 text-center"&gt;
                    &lt;svg class="mx-auto h-12 w-12 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"&gt;
                        &lt;path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /&gt;
                    &lt;/svg&gt;
                    &lt;h3 class="mt-2 text-sm font-medium text-neutral-900 dark:text-white"&gt;
                        Nenhum registro encontrado
                    &lt;/h3&gt;
                    &lt;p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400"&gt;
                        Comece criando um novo registro.
                    &lt;/p&gt;
                    &lt;div class="mt-6"&gt;
                        &lt;x-button size="sm"&gt;Criar Novo&lt;/x-button&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/x-table.cell&gt;
        &lt;/x-table.row&gt;
    &lt;/x-table.body&gt;
&lt;/x-table&gt;</code></pre>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-3">Exemplo com Livewire</h3>
            <div class="bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
                <pre class="text-sm text-neutral-100"><code>&lt;x-table.body&gt;
    @@forelse ($users as $user)
        &lt;x-table.row wire:key="user-@{{ $user-&gt;id }}"&gt;
            &lt;x-table.cell&gt;@{{ $user-&gt;name }}&lt;/x-table.cell&gt;
            &lt;x-table.cell&gt;@{{ $user-&gt;email }}&lt;/x-table.cell&gt;
        &lt;/x-table.row&gt;
    @@empty
        &lt;x-table.row :hoverable="false"&gt;
            &lt;x-table.cell colspan="3"&gt;
                &lt;div class="py-12 text-center"&gt;
                    &lt;svg class="mx-auto h-12 w-12 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"&gt;
                        &lt;path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /&gt;
                    &lt;/svg&gt;
                    &lt;h3 class="mt-2 text-sm font-medium text-neutral-900 dark:text-white"&gt;
                        Nenhum registro encontrado
                    &lt;/h3&gt;
                    &lt;p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400"&gt;
                        Comece criando um novo registro.
                    &lt;/p&gt;
                    &lt;div class="mt-6"&gt;
                        &lt;x-button size="sm" wire:click="create"&gt;Criar Novo&lt;/x-button&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/x-table.cell&gt;
        &lt;/x-table.row&gt;
    @@endforelse
&lt;/x-table.body&gt;</code></pre>
            </div>
        </div>
    </section>

    <!-- Loading State -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Estado de Carregamento</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Indicador visual durante carregamento de dados.
        </p>

        <x-card padding="none">
            <x-table>
                <x-table.head>
                    <x-table.row>
                        <x-table.header>Nome</x-table.header>
                        <x-table.header>Email</x-table.header>
                        <x-table.header>Função</x-table.header>
                    </x-table.row>
                </x-table.head>
                <x-table.body>
                    @foreach(range(1, 3) as $i)
                        <x-table.row :hoverable="false">
                            <x-table.cell>
                                <div class="h-4 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-32"></div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="h-4 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-48"></div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="h-4 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-24"></div>
                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-table.body>
            </x-table>
        </x-card>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;!-- Skeleton Loading para 3 linhas --&gt;
@@foreach(range(1, 3) as $i)
    &lt;x-table.row :hoverable="false"&gt;
        &lt;x-table.cell&gt;
            &lt;div class="h-4 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-32"&gt;&lt;/div&gt;
        &lt;/x-table.cell&gt;
        &lt;x-table.cell&gt;
            &lt;div class="h-4 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-48"&gt;&lt;/div&gt;
        &lt;/x-table.cell&gt;
        &lt;x-table.cell&gt;
            &lt;div class="h-4 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-24"&gt;&lt;/div&gt;
        &lt;/x-table.cell&gt;
    &lt;/x-table.row&gt;
@@endforeach</code></pre>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-3">Exemplo com Livewire</h3>
            <div class="bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
                <pre class="text-sm text-neutral-100"><code>&lt;x-table.body&gt;
    @@if ($isLoading)
        &lt;!-- Estado de carregamento --&gt;
        @@foreach(range(1, 5) as $i)
            &lt;x-table.row :hoverable="false"&gt;
                &lt;x-table.cell&gt;
                    &lt;div class="h-4 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-32"&gt;&lt;/div&gt;
                &lt;/x-table.cell&gt;
                &lt;x-table.cell&gt;
                    &lt;div class="h-4 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-48"&gt;&lt;/div&gt;
                &lt;/x-table.cell&gt;
                &lt;x-table.cell&gt;
                    &lt;div class="h-4 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-24"&gt;&lt;/div&gt;
                &lt;/x-table.cell&gt;
            &lt;/x-table.row&gt;
        @@endforeach
    @@else
        &lt;!-- Dados reais --&gt;
        @@foreach ($users as $user)
            &lt;x-table.row wire:key="user-@{{ $user-&gt;id }}"&gt;
                &lt;x-table.cell&gt;@{{ $user-&gt;name }}&lt;/x-table.cell&gt;
                &lt;x-table.cell&gt;@{{ $user-&gt;email }}&lt;/x-table.cell&gt;
                &lt;x-table.cell&gt;@{{ $user-&gt;role }}&lt;/x-table.cell&gt;
            &lt;/x-table.row&gt;
        @@endforeach
    @@endif
&lt;/x-table.body&gt;</code></pre>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-3">Usando wire:loading do Livewire</h3>
            <div class="bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
                <pre class="text-sm text-neutral-100"><code>&lt;x-table.body&gt;
    &lt;!-- Skeleton aparece durante wire:loading --&gt;
    &lt;div wire:loading&gt;
        @@foreach(range(1, 5) as $i)
            &lt;x-table.row :hoverable="false"&gt;
                &lt;x-table.cell&gt;
                    &lt;div class="h-4 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-32"&gt;&lt;/div&gt;
                &lt;/x-table.cell&gt;
                &lt;x-table.cell&gt;
                    &lt;div class="h-4 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-48"&gt;&lt;/div&gt;
                &lt;/x-table.cell&gt;
            &lt;/x-table.row&gt;
        @@endforeach
    &lt;/div&gt;

    &lt;!-- Dados aparecem quando não está carregando --&gt;
    &lt;div wire:loading.remove&gt;
        @@foreach ($users as $user)
            &lt;x-table.row wire:key="user-@{{ $user-&gt;id }}"&gt;
                &lt;x-table.cell&gt;@{{ $user-&gt;name }}&lt;/x-table.cell&gt;
                &lt;x-table.cell&gt;@{{ $user-&gt;email }}&lt;/x-table.cell&gt;
            &lt;/x-table.row&gt;
        @@endforeach
    &lt;/div&gt;
&lt;/x-table.body&gt;</code></pre>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-3">Variações de Skeleton</h3>
            <x-card padding="none">
                <x-table>
                    <x-table.head>
                        <x-table.row>
                            <x-table.header>Usuário</x-table.header>
                            <x-table.header>Status</x-table.header>
                            <x-table.header align="right">Ações</x-table.header>
                        </x-table.row>
                    </x-table.head>
                    <x-table.body>
                        @foreach(range(1, 3) as $i)
                            <x-table.row :hoverable="false">
                                <x-table.cell>
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-neutral-200 dark:bg-neutral-700 animate-pulse"></div>
                                        <div class="space-y-2">
                                            <div class="h-4 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-32"></div>
                                            <div class="h-3 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-48"></div>
                                        </div>
                                    </div>
                                </x-table.cell>
                                <x-table.cell>
                                    <div class="h-6 bg-neutral-200 dark:bg-neutral-700 rounded-full animate-pulse w-16"></div>
                                </x-table.cell>
                                <x-table.cell align="right">
                                    <div class="flex items-center justify-end gap-2">
                                        <div class="w-5 h-5 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse"></div>
                                        <div class="w-5 h-5 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse"></div>
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                        @endforeach
                    </x-table.body>
                </x-table>
            </x-card>

            <div class="mt-4 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
                <pre class="text-sm text-neutral-100"><code>&lt;!-- Skeleton com avatar e múltiplas linhas --&gt;
&lt;x-table.cell&gt;
    &lt;div class="flex items-center gap-3"&gt;
        &lt;div class="w-8 h-8 rounded-full bg-neutral-200 dark:bg-neutral-700 animate-pulse"&gt;&lt;/div&gt;
        &lt;div class="space-y-2"&gt;
            &lt;div class="h-4 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-32"&gt;&lt;/div&gt;
            &lt;div class="h-3 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse w-48"&gt;&lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/x-table.cell&gt;

&lt;!-- Skeleton para badge --&gt;
&lt;x-table.cell&gt;
    &lt;div class="h-6 bg-neutral-200 dark:bg-neutral-700 rounded-full animate-pulse w-16"&gt;&lt;/div&gt;
&lt;/x-table.cell&gt;

&lt;!-- Skeleton para ícones de ação --&gt;
&lt;x-table.cell align="right"&gt;
    &lt;div class="flex items-center justify-end gap-2"&gt;
        &lt;div class="w-5 h-5 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse"&gt;&lt;/div&gt;
        &lt;div class="w-5 h-5 bg-neutral-200 dark:bg-neutral-700 rounded animate-pulse"&gt;&lt;/div&gt;
    &lt;/div&gt;
&lt;/x-table.cell&gt;</code></pre>
            </div>
        </div>
    </section>

    <!-- Props Table -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Propriedades</h2>

        <x-card padding="none">
            <x-table>
                <x-table.head>
                    <x-table.row>
                        <x-table.header>Componente</x-table.header>
                        <x-table.header>Prop</x-table.header>
                        <x-table.header>Tipo</x-table.header>
                        <x-table.header>Padrão</x-table.header>
                        <x-table.header>Valores</x-table.header>
                    </x-table.row>
                </x-table.head>
                <x-table.body>
                    <x-table.row>
                        <x-table.cell class="font-medium">table.header</x-table.cell>
                        <x-table.cell>sortable</x-table.cell>
                        <x-table.cell>boolean</x-table.cell>
                        <x-table.cell>false</x-table.cell>
                        <x-table.cell>true, false</x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell class="font-medium">table.header</x-table.cell>
                        <x-table.cell>sorted</x-table.cell>
                        <x-table.cell>string</x-table.cell>
                        <x-table.cell>null</x-table.cell>
                        <x-table.cell>asc, desc, null</x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell class="font-medium">table.header</x-table.cell>
                        <x-table.cell>align</x-table.cell>
                        <x-table.cell>string</x-table.cell>
                        <x-table.cell>left</x-table.cell>
                        <x-table.cell>left, center, right</x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell class="font-medium">table.cell</x-table.cell>
                        <x-table.cell>align</x-table.cell>
                        <x-table.cell>string</x-table.cell>
                        <x-table.cell>left</x-table.cell>
                        <x-table.cell>left, center, right</x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell class="font-medium">table.row</x-table.cell>
                        <x-table.cell>hoverable</x-table.cell>
                        <x-table.cell>boolean</x-table.cell>
                        <x-table.cell>true</x-table.cell>
                        <x-table.cell>true, false</x-table.cell>
                    </x-table.row>
                </x-table.body>
            </x-table>
        </x-card>
    </section>

    <!-- Best Practices -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Boas Práticas</h2>

        <div class="space-y-4">
            <x-alert variant="success">
                <x-slot:title>Ordenação</x-slot:title>
                Use ordenação para colunas com dados comparáveis (texto, números, datas). Indique visualmente qual coluna está ordenada.
            </x-alert>

            <x-alert variant="info">
                <x-slot:title>Paginação</x-slot:title>
                Para grandes conjuntos de dados, sempre use paginação. Recomenda-se 10-50 itens por página.
            </x-alert>

            <x-alert variant="warning">
                <x-slot:title>Responsividade</x-slot:title>
                Em telas pequenas, considere usar cards em vez de tabelas ou permitir scroll horizontal.
            </x-alert>

            <x-alert variant="default">
                <x-slot:title>Acessibilidade</x-slot:title>
                Use elementos semânticos (&lt;table&gt;, &lt;thead&gt;, &lt;tbody&gt;) e atributos ARIA apropriados.
            </x-alert>
        </div>
    </section>
</div>
