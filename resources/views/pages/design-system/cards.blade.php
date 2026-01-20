<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Layout('layouts.design-system')]
#[Title('Cards')]
class extends Component {};
?>

<div>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">Cards</h1>
        <p class="text-neutral-600 dark:text-neutral-400">Componentes versáteis para agrupar e organizar conteúdo</p>
    </div>

    <!-- Basic Cards -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Cards Básicos</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Cards simples com diferentes configurações de padding, shadow e border.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <x-card>
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Card Padrão</h3>
                <p class="text-neutral-600 dark:text-neutral-400">Um card básico com padding, shadow e border padrão.</p>
            </x-card>

            <x-card :shadow="false">
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Sem Shadow</h3>
                <p class="text-neutral-600 dark:text-neutral-400">Card sem sombra.</p>
            </x-card>

            <x-card :border="false">
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Sem Border</h3>
                <p class="text-neutral-600 dark:text-neutral-400">Card sem borda.</p>
            </x-card>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-card&gt;
    &lt;h3&gt;Card Padrão&lt;/h3&gt;
    &lt;p&gt;Conteúdo do card&lt;/p&gt;
&lt;/x-card&gt;

&lt;x-card :shadow="false"&gt;...&lt;/x-card&gt;
&lt;x-card :border="false"&gt;...&lt;/x-card&gt;</code></pre>
        </div>
    </section>

    <!-- Card Variants -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Variantes</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Cards com diferentes estilos visuais.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <x-card variant="default">
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Default</h3>
                <p class="text-neutral-600 dark:text-neutral-400">Variante padrão do card.</p>
            </x-card>

            <x-card variant="primary">
                <h3 class="font-semibold text-primary-900 dark:text-primary-100 mb-2">Primary</h3>
                <p class="text-primary-700 dark:text-primary-300">Com destaque primário.</p>
            </x-card>

            <x-card variant="secondary">
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Secondary</h3>
                <p class="text-neutral-600 dark:text-neutral-400">Variante secundária.</p>
            </x-card>

            <x-card variant="transparent">
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Transparent</h3>
                <p class="text-neutral-600 dark:text-neutral-400">Fundo transparente.</p>
            </x-card>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-card variant="default"&gt;...&lt;/x-card&gt;
&lt;x-card variant="primary"&gt;...&lt;/x-card&gt;
&lt;x-card variant="secondary"&gt;...&lt;/x-card&gt;
&lt;x-card variant="transparent"&gt;...&lt;/x-card&gt;</code></pre>
        </div>
    </section>

    <!-- Card Padding -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Padding</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Controle o espaçamento interno do card.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <x-card padding="sm">
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Small (sm)</h3>
                <p class="text-neutral-600 dark:text-neutral-400">Padding reduzido.</p>
            </x-card>

            <x-card padding="default">
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Default</h3>
                <p class="text-neutral-600 dark:text-neutral-400">Padding padrão.</p>
            </x-card>

            <x-card padding="lg">
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Large (lg)</h3>
                <p class="text-neutral-600 dark:text-neutral-400">Padding maior.</p>
            </x-card>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-card padding="sm"&gt;...&lt;/x-card&gt;
&lt;x-card padding="default"&gt;...&lt;/x-card&gt;
&lt;x-card padding="md"&gt;...&lt;/x-card&gt;
&lt;x-card padding="lg"&gt;...&lt;/x-card&gt;
&lt;x-card padding="xl"&gt;...&lt;/x-card&gt;</code></pre>
        </div>
    </section>

    <!-- Interactive Cards -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Cards Interativos</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Cards com efeitos de hover e interatividade.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <x-card :hover="true">
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Hover Effect</h3>
                <p class="text-neutral-600 dark:text-neutral-400">Card com efeito de elevação ao passar o mouse.</p>
            </x-card>

            <x-card :interactive="true">
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Interactive</h3>
                <p class="text-neutral-600 dark:text-neutral-400">Card clicável com border highlight.</p>
            </x-card>

            <x-card :hover="true" :interactive="true">
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Hover + Interactive</h3>
                <p class="text-neutral-600 dark:text-neutral-400">Combinação de ambos os efeitos.</p>
            </x-card>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-card :hover="true"&gt;...&lt;/x-card&gt;
&lt;x-card :interactive="true"&gt;...&lt;/x-card&gt;
&lt;x-card :hover="true" :interactive="true"&gt;...&lt;/x-card&gt;</code></pre>
        </div>
    </section>

    <!-- Cards with Slots -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Cards com Slots</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Usando slots nomeados para header e footer.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-card>
                <x-slot:header>
                    <h3 class="font-semibold text-neutral-900 dark:text-white">Card com Header</h3>
                </x-slot:header>

                <p class="text-neutral-600 dark:text-neutral-400">
                    Este card possui um header separado usando slots nomeados.
                </p>
            </x-card>

            <x-card>
                <p class="text-neutral-600 dark:text-neutral-400">
                    Este card possui um footer com ações.
                </p>

                <x-slot:footer>
                    <x-button variant="primary" size="sm">Confirmar</x-button>
                    <x-button variant="tertiary" size="sm">Cancelar</x-button>
                </x-slot:footer>
            </x-card>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-card&gt;
    &lt;x-slot:header&gt;
        &lt;h3&gt;Card com Header&lt;/h3&gt;
    &lt;/x-slot:header&gt;

    &lt;p&gt;Conteúdo...&lt;/p&gt;

    &lt;x-slot:footer&gt;
        &lt;x-button&gt;Ação&lt;/x-button&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-card&gt;</code></pre>
        </div>
    </section>

    <!-- Cards with Subcomponents -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Cards com Subcomponentes</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Usando os subcomponentes card.header, card.body e card.footer para maior controle.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-card padding="none">
                <x-card.header divided>
                    <h3 class="font-semibold text-neutral-900 dark:text-white">Header Dividido</h3>
                    <p class="text-sm text-neutral-600 dark:text-neutral-400">Com borda inferior</p>
                </x-card.header>

                <x-card.body>
                    <p class="text-neutral-600 dark:text-neutral-400">
                        O header possui borda inferior para separar visualmente do body.
                    </p>
                </x-card.body>
            </x-card>

            <x-card padding="none">
                <x-card.header>
                    <h3 class="font-semibold text-neutral-900 dark:text-white">Card Completo</h3>
                </x-card.header>

                <x-card.body>
                    <p class="text-neutral-600 dark:text-neutral-400">
                        Conteúdo principal do card.
                    </p>
                </x-card.body>

                <x-card.footer divided align="right">
                    <x-button variant="tertiary" size="sm">Cancelar</x-button>
                    <x-button variant="primary" size="sm">Salvar</x-button>
                </x-card.footer>
            </x-card>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-card padding="none"&gt;
    &lt;x-card.header divided&gt;
        &lt;h3&gt;Título&lt;/h3&gt;
    &lt;/x-card.header&gt;

    &lt;x-card.body&gt;
        &lt;p&gt;Conteúdo...&lt;/p&gt;
    &lt;/x-card.body&gt;

    &lt;x-card.footer divided align="right"&gt;
        &lt;x-button&gt;Ação&lt;/x-button&gt;
    &lt;/x-card.footer&gt;
&lt;/x-card&gt;</code></pre>
        </div>
    </section>

    <!-- Advanced Examples -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Exemplos Avançados</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Exemplos práticos de uso dos cards.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Product Card -->
            <x-card padding="none" :hover="true" :interactive="true">
                <div class="aspect-video bg-neutral-200 dark:bg-neutral-700 rounded-t-lg"></div>
                <x-card.body>
                    <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Produto</h3>
                    <p class="text-neutral-600 dark:text-neutral-400 text-sm mb-4">
                        Descrição breve do produto com principais características.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold text-primary-600 dark:text-primary-400">R$ 99,90</span>
                        <x-button size="sm">Comprar</x-button>
                    </div>
                </x-card.body>
            </x-card>

            <!-- Stats Card -->
            <x-card variant="primary">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm text-primary-700 dark:text-primary-300 mb-1">Total de Vendas</p>
                        <p class="text-3xl font-bold text-primary-900 dark:text-primary-100">1.234</p>
                    </div>
                    <div class="p-3 bg-primary-100 dark:bg-primary-900 rounded-lg">
                        <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-primary-600 dark:text-primary-400 mt-4">
                    <span class="font-semibold">↑ 12%</span> vs mês anterior
                </p>
            </x-card>

            <!-- User Card -->
            <x-card padding="none">
                <x-card.body class="text-center">
                    <div class="w-20 h-20 bg-neutral-200 dark:bg-neutral-700 rounded-full mx-auto mb-4"></div>
                    <h3 class="font-semibold text-neutral-900 dark:text-white mb-1">João Silva</h3>
                    <p class="text-sm text-neutral-600 dark:text-neutral-400 mb-4">Desenvolvedor</p>
                </x-card.body>
                <x-card.footer divided align="center">
                    <x-button variant="outline" size="sm" fullWidth>Ver Perfil</x-button>
                </x-card.footer>
            </x-card>
        </div>
    </section>

    <!-- Props Table -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Propriedades</h2>

        <x-card padding="none">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-neutral-50 dark:bg-neutral-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Prop</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Tipo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Padrão</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Valores</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-neutral-900 divide-y divide-neutral-200 dark:divide-neutral-700">
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900 dark:text-white">variant</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">string</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">default</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">default, primary, secondary, transparent</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900 dark:text-white">padding</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">string</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">default</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">none, sm, default, md, lg, xl</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900 dark:text-white">shadow</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">boolean</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">true</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">true, false</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900 dark:text-white">border</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">boolean</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">true</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">true, false</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900 dark:text-white">hover</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">boolean</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">false</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">true, false</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900 dark:text-white">interactive</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">boolean</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">false</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">true, false</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-card>
    </section>
</div>
