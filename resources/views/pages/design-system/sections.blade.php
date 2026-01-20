<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Layout('layouts.design-system')]
#[Title('Sections')]
class extends Component {};
?>

<div>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">Sections</h1>
        <p class="text-neutral-600 dark:text-neutral-400">Containers para organizar e estruturar o conteúdo da aplicação</p>
    </div>

    <!-- Basic Section -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Section Básica</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Uma section simples com padding e largura máxima padrão.
        </p>

        <div class="border-2 border-dashed border-primary-300 dark:border-primary-700 rounded-lg p-1">
            <x-section background="white">
                <h3 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4">Conteúdo da Section</h3>
                <p class="text-neutral-600 dark:text-neutral-400 mb-4">
                    Esta é uma section básica que centraliza o conteúdo e limita a largura máxima para melhor legibilidade.
                </p>
                <p class="text-neutral-600 dark:text-neutral-400">
                    Perfeita para o corpo principal da aplicação.
                </p>
            </x-section>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-section&gt;
    &lt;h3&gt;Título&lt;/h3&gt;
    &lt;p&gt;Conteúdo da section...&lt;/p&gt;
&lt;/x-section&gt;</code></pre>
        </div>
    </section>

    <!-- Section Sizes -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Tamanhos</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Controle a largura máxima da section.
        </p>

        <div class="space-y-4">
            <div class="border-2 border-dashed border-blue-300 dark:border-blue-700 rounded-lg p-1">
                <x-section size="sm" background="white">
                    <p class="text-center text-neutral-600 dark:text-neutral-400">Small (max-w-2xl)</p>
                </x-section>
            </div>

            <div class="border-2 border-dashed border-green-300 dark:border-green-700 rounded-lg p-1">
                <x-section size="md" background="white">
                    <p class="text-center text-neutral-600 dark:text-neutral-400">Medium (max-w-4xl)</p>
                </x-section>
            </div>

            <div class="border-2 border-dashed border-purple-300 dark:border-purple-700 rounded-lg p-1">
                <x-section size="default" background="white">
                    <p class="text-center text-neutral-600 dark:text-neutral-400">Default (max-w-5xl)</p>
                </x-section>
            </div>

            <div class="border-2 border-dashed border-orange-300 dark:border-orange-700 rounded-lg p-1">
                <x-section size="lg" background="white">
                    <p class="text-center text-neutral-600 dark:text-neutral-400">Large (max-w-6xl)</p>
                </x-section>
            </div>

            <div class="border-2 border-dashed border-red-300 dark:border-red-700 rounded-lg p-1">
                <x-section size="xl" background="white">
                    <p class="text-center text-neutral-600 dark:text-neutral-400">Extra Large (max-w-7xl)</p>
                </x-section>
            </div>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-section size="sm"&gt;...&lt;/x-section&gt;
&lt;x-section size="md"&gt;...&lt;/x-section&gt;
&lt;x-section size="default"&gt;...&lt;/x-section&gt;
&lt;x-section size="lg"&gt;...&lt;/x-section&gt;
&lt;x-section size="xl"&gt;...&lt;/x-section&gt;
&lt;x-section size="2xl"&gt;...&lt;/x-section&gt;
&lt;x-section size="full"&gt;...&lt;/x-section&gt;</code></pre>
        </div>
    </section>

    <!-- Backgrounds -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Backgrounds</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Diferentes opções de cor de fundo.
        </p>

        <div class="space-y-4">
            <x-section background="transparent" bordered>
                <p class="text-center text-neutral-600 dark:text-neutral-400">Transparent (padrão)</p>
            </x-section>

            <x-section background="white">
                <p class="text-center text-neutral-600 dark:text-neutral-400">White / Dark Neutral-900</p>
            </x-section>

            <x-section background="gray">
                <p class="text-center text-neutral-600 dark:text-neutral-400">Gray (Neutral-50 / Dark Neutral-1000)</p>
            </x-section>

            <x-section background="primary">
                <p class="text-center text-primary-700 dark:text-primary-300">Primary (Primary-50 / Dark Primary-950)</p>
            </x-section>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-section background="transparent"&gt;...&lt;/x-section&gt;
&lt;x-section background="white"&gt;...&lt;/x-section&gt;
&lt;x-section background="gray"&gt;...&lt;/x-section&gt;
&lt;x-section background="primary"&gt;...&lt;/x-section&gt;</code></pre>
        </div>
    </section>

    <!-- Spacing -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Espaçamento Vertical</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Controle o padding vertical da section.
        </p>

        <div class="space-y-4">
            <div class="border-2 border-dashed border-neutral-300 dark:border-neutral-700 rounded-lg">
                <x-section spacingY="sm" background="white">
                    <p class="text-center text-neutral-600 dark:text-neutral-400">Small (py-4)</p>
                </x-section>
            </div>

            <div class="border-2 border-dashed border-neutral-300 dark:border-neutral-700 rounded-lg">
                <x-section spacingY="default" background="white">
                    <p class="text-center text-neutral-600 dark:text-neutral-400">Default (py-8)</p>
                </x-section>
            </div>

            <div class="border-2 border-dashed border-neutral-300 dark:border-neutral-700 rounded-lg">
                <x-section spacingY="lg" background="white">
                    <p class="text-center text-neutral-600 dark:text-neutral-400">Large (py-12)</p>
                </x-section>
            </div>

            <div class="border-2 border-dashed border-neutral-300 dark:border-neutral-700 rounded-lg">
                <x-section spacingY="xl" background="white">
                    <p class="text-center text-neutral-600 dark:text-neutral-400">Extra Large (py-16)</p>
                </x-section>
            </div>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-section spacingY="sm"&gt;...&lt;/x-section&gt;
&lt;x-section spacingY="default"&gt;...&lt;/x-section&gt;
&lt;x-section spacingY="md"&gt;...&lt;/x-section&gt;
&lt;x-section spacingY="lg"&gt;...&lt;/x-section&gt;
&lt;x-section spacingY="xl"&gt;...&lt;/x-section&gt;
&lt;x-section spacingY="2xl"&gt;...&lt;/x-section&gt;</code></pre>
        </div>
    </section>

    <!-- With Header Slot -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Section com Header</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Use slots para adicionar header e footer.
        </p>

        <div class="border-2 border-dashed border-primary-300 dark:border-primary-700 rounded-lg p-1">
            <x-section background="white">
                <x-slot:header>
                    <h2 class="text-2xl font-bold text-neutral-900 dark:text-white mb-2">Título da Section</h2>
                    <p class="text-neutral-600 dark:text-neutral-400">Descrição ou subtítulo da section</p>
                </x-slot:header>

                <p class="text-neutral-600 dark:text-neutral-400 mb-4">
                    Conteúdo principal da section vem aqui.
                </p>
                <p class="text-neutral-600 dark:text-neutral-400">
                    Você pode adicionar qualquer conteúdo que precisar.
                </p>

                <x-slot:footer>
                    <div class="flex gap-3 justify-end">
                        <x-button variant="tertiary">Cancelar</x-button>
                        <x-button variant="primary">Salvar</x-button>
                    </div>
                </x-slot:footer>
            </x-section>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-section&gt;
    &lt;x-slot:header&gt;
        &lt;h2&gt;Título da Section&lt;/h2&gt;
        &lt;p&gt;Descrição...&lt;/p&gt;
    &lt;/x-slot:header&gt;

    &lt;p&gt;Conteúdo principal...&lt;/p&gt;

    &lt;x-slot:footer&gt;
        &lt;x-button&gt;Ação&lt;/x-button&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-section&gt;</code></pre>
        </div>
    </section>

    <!-- With Subcomponents -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Section com Subcomponentes</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Use os subcomponentes para maior controle.
        </p>

        <div class="border-2 border-dashed border-primary-300 dark:border-primary-700 rounded-lg p-1">
            <x-section background="white">
                <x-section.header title="Dashboard" description="Visão geral das suas métricas" />

                <x-section.content>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <x-card variant="primary">
                            <h3 class="text-lg font-semibold text-primary-900 dark:text-primary-100 mb-2">Total de Vendas</h3>
                            <p class="text-3xl font-bold text-primary-600 dark:text-primary-400">1.234</p>
                        </x-card>

                        <x-card variant="default">
                            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-2">Usuários Ativos</h3>
                            <p class="text-3xl font-bold text-neutral-600 dark:text-neutral-400">567</p>
                        </x-card>

                        <x-card variant="default">
                            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-2">Taxa de Conversão</h3>
                            <p class="text-3xl font-bold text-neutral-600 dark:text-neutral-400">23%</p>
                        </x-card>
                    </div>
                </x-section.content>
            </x-section>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-section&gt;
    &lt;x-section.header
        title="Dashboard"
        description="Visão geral das suas métricas"
    /&gt;

    &lt;x-section.content&gt;
        &lt;!-- Seu conteúdo aqui --&gt;
    &lt;/x-section.content&gt;
&lt;/x-section&gt;</code></pre>
        </div>
    </section>

    <!-- Bordered Section -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Section com Bordas</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Adicione bordas superior e inferior para separar visualmente.
        </p>

        <x-section background="white" bordered>
            <h3 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4">Section com Bordas</h3>
            <p class="text-neutral-600 dark:text-neutral-400">
                Esta section possui bordas superior e inferior para maior separação visual do resto da página.
            </p>
        </x-section>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-section :bordered="true"&gt;
    &lt;h3&gt;Título&lt;/h3&gt;
    &lt;p&gt;Conteúdo...&lt;/p&gt;
&lt;/x-section&gt;</code></pre>
        </div>
    </section>

    <!-- Practical Example -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Exemplo Prático</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Exemplo de uma página completa usando sections.
        </p>

        <div class="border-2 border-dashed border-primary-300 dark:border-primary-700 rounded-lg p-1">
            <!-- Hero Section -->
            <x-section size="xl" spacingY="2xl" background="primary">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl font-bold text-primary-900 dark:text-primary-100 mb-4">
                        Bem-vindo ao Sistema
                    </h1>
                    <p class="text-xl text-primary-700 dark:text-primary-300 mb-8">
                        Gerencie seus projetos de forma simples e eficiente
                    </p>
                    <x-button size="lg">Começar Agora</x-button>
                </div>
            </x-section>

            <!-- Features Section -->
            <x-section spacingY="xl" background="white">
                <x-section.header title="Funcionalidades" description="Tudo que você precisa em um só lugar" />

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <x-card :hover="true">
                        <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-2">Rápido</h3>
                        <p class="text-neutral-600 dark:text-neutral-400">Performance otimizada para máxima velocidade.</p>
                    </x-card>

                    <x-card :hover="true">
                        <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-2">Seguro</h3>
                        <p class="text-neutral-600 dark:text-neutral-400">Seus dados protegidos com criptografia de ponta.</p>
                    </x-card>

                    <x-card :hover="true">
                        <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-2">Intuitivo</h3>
                        <p class="text-neutral-600 dark:text-neutral-400">Interface simples e fácil de usar.</p>
                    </x-card>
                </div>
            </x-section>

            <!-- CTA Section -->
            <x-section spacingY="lg" background="gray" bordered>
                <div class="text-center">
                    <h2 class="text-2xl font-bold text-neutral-900 dark:text-white mb-4">
                        Pronto para começar?
                    </h2>
                    <p class="text-neutral-600 dark:text-neutral-400 mb-6">
                        Junte-se a milhares de usuários satisfeitos
                    </p>
                    <div class="flex gap-3 justify-center">
                        <x-button variant="primary" size="lg">Criar Conta</x-button>
                        <x-button variant="outline" size="lg">Saber Mais</x-button>
                    </div>
                </div>
            </x-section>
        </div>
    </section>

    <!-- Props Table -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Propriedades</h2>

        <x-card padding="none">
            <x-table>
                <x-table.head>
                    <x-table.row>
                        <x-table.header>Prop</x-table.header>
                        <x-table.header>Tipo</x-table.header>
                        <x-table.header>Padrão</x-table.header>
                        <x-table.header>Valores</x-table.header>
                        <x-table.header>Descrição</x-table.header>
                    </x-table.row>
                </x-table.head>
                <x-table.body>
                    <x-table.row>
                        <x-table.cell class="font-medium">size</x-table.cell>
                        <x-table.cell>string</x-table.cell>
                        <x-table.cell>default</x-table.cell>
                        <x-table.cell>sm, md, default, lg, xl, 2xl, full</x-table.cell>
                        <x-table.cell>Largura máxima da section</x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell class="font-medium">padding</x-table.cell>
                        <x-table.cell>string</x-table.cell>
                        <x-table.cell>default</x-table.cell>
                        <x-table.cell>none, sm, default, lg, xl</x-table.cell>
                        <x-table.cell>Padding horizontal</x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell class="font-medium">spacingY</x-table.cell>
                        <x-table.cell>string</x-table.cell>
                        <x-table.cell>default</x-table.cell>
                        <x-table.cell>none, sm, default, md, lg, xl, 2xl</x-table.cell>
                        <x-table.cell>Espaçamento vertical</x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell class="font-medium">background</x-table.cell>
                        <x-table.cell>string</x-table.cell>
                        <x-table.cell>transparent</x-table.cell>
                        <x-table.cell>transparent, white, gray, primary</x-table.cell>
                        <x-table.cell>Cor de fundo</x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell class="font-medium">bordered</x-table.cell>
                        <x-table.cell>boolean</x-table.cell>
                        <x-table.cell>false</x-table.cell>
                        <x-table.cell>true, false</x-table.cell>
                        <x-table.cell>Adiciona bordas superior e inferior</x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell class="font-medium">centered</x-table.cell>
                        <x-table.cell>boolean</x-table.cell>
                        <x-table.cell>true</x-table.cell>
                        <x-table.cell>true, false</x-table.cell>
                        <x-table.cell>Centraliza a section horizontalmente</x-table.cell>
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
                <x-slot:title>Hierarquia Visual</x-slot:title>
                Use diferentes tamanhos de section para criar hierarquia. Hero sections podem ser xl, conteúdo principal default ou lg.
            </x-alert>

            <x-alert variant="info">
                <x-slot:title>Espaçamento Consistente</x-slot:title>
                Mantenha espaçamento vertical consistente entre sections. Use spacingY="xl" ou "2xl" para sections principais.
            </x-alert>

            <x-alert variant="warning">
                <x-slot:title>Backgrounds Alternados</x-slot:title>
                Alterne backgrounds (white, gray) entre sections para criar separação visual sem bordas.
            </x-alert>

            <x-alert variant="default">
                <x-slot:title>Responsividade</x-slot:title>
                O padding horizontal já é responsivo (px-6 sm:px-8). Ajuste conforme necessário para seu design.
            </x-alert>
        </div>
    </section>
</div>
