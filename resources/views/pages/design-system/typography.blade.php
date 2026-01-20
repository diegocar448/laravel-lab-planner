<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Layout('layouts.design-system')]
#[Title('Typography')]
class extends Component {};
?>

<div>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">Typography</h1>
        <p class="text-neutral-600 dark:text-neutral-400">Sistema tipográfico consistente para toda a aplicação</p>
    </div>

    <!-- Headings -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Títulos (Headings)</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Hierarquia de títulos para estruturar conteúdo.
        </p>

        <x-card>
            <div class="space-y-4">
                <div>
                    <h1 class="text-5xl font-bold text-neutral-900 dark:text-white">Heading 1</h1>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-1">text-5xl font-bold</p>
                </div>

                <div>
                    <h2 class="text-4xl font-bold text-neutral-900 dark:text-white">Heading 2</h2>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-1">text-4xl font-bold</p>
                </div>

                <div>
                    <h3 class="text-3xl font-bold text-neutral-900 dark:text-white">Heading 3</h3>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-1">text-3xl font-bold</p>
                </div>

                <div>
                    <h4 class="text-2xl font-semibold text-neutral-900 dark:text-white">Heading 4</h4>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-1">text-2xl font-semibold</p>
                </div>

                <div>
                    <h5 class="text-xl font-semibold text-neutral-900 dark:text-white">Heading 5</h5>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-1">text-xl font-semibold</p>
                </div>

                <div>
                    <h6 class="text-lg font-semibold text-neutral-900 dark:text-white">Heading 6</h6>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-1">text-lg font-semibold</p>
                </div>
            </div>
        </x-card>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;h1 class="text-5xl font-bold"&gt;Heading 1&lt;/h1&gt;
&lt;h2 class="text-4xl font-bold"&gt;Heading 2&lt;/h2&gt;
&lt;h3 class="text-3xl font-bold"&gt;Heading 3&lt;/h3&gt;
&lt;h4 class="text-2xl font-semibold"&gt;Heading 4&lt;/h4&gt;
&lt;h5 class="text-xl font-semibold"&gt;Heading 5&lt;/h5&gt;
&lt;h6 class="text-lg font-semibold"&gt;Heading 6&lt;/h6&gt;</code></pre>
        </div>
    </section>

    <!-- Body Text Sizes -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Tamanhos de Texto</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Diferentes tamanhos para texto de corpo e interface.
        </p>

        <x-card>
            <div class="space-y-4">
                <div>
                    <p class="text-xs text-neutral-900 dark:text-white">Extra Small - text-xs</p>
                    <p class="text-xs text-neutral-500 dark:text-neutral-400">The quick brown fox jumps over the lazy dog</p>
                </div>

                <div>
                    <p class="text-sm text-neutral-900 dark:text-white">Small - text-sm</p>
                    <p class="text-sm text-neutral-600 dark:text-neutral-400">The quick brown fox jumps over the lazy dog</p>
                </div>

                <div>
                    <p class="text-base text-neutral-900 dark:text-white">Base - text-base</p>
                    <p class="text-base text-neutral-600 dark:text-neutral-400">The quick brown fox jumps over the lazy dog</p>
                </div>

                <div>
                    <p class="text-lg text-neutral-900 dark:text-white">Large - text-lg</p>
                    <p class="text-lg text-neutral-600 dark:text-neutral-400">The quick brown fox jumps over the lazy dog</p>
                </div>

                <div>
                    <p class="text-xl text-neutral-900 dark:text-white">Extra Large - text-xl</p>
                    <p class="text-xl text-neutral-600 dark:text-neutral-400">The quick brown fox jumps over the lazy dog</p>
                </div>

                <div>
                    <p class="text-2xl text-neutral-900 dark:text-white">2XL - text-2xl</p>
                    <p class="text-2xl text-neutral-600 dark:text-neutral-400">The quick brown fox jumps over the lazy dog</p>
                </div>
            </div>
        </x-card>
    </section>

    <!-- Font Weights -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Pesos de Fonte</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Variações de peso para criar hierarquia e ênfase.
        </p>

        <x-card>
            <div class="space-y-3">
                <p class="text-lg font-light text-neutral-900 dark:text-white">Light (300) - font-light</p>
                <p class="text-lg font-normal text-neutral-900 dark:text-white">Normal (400) - font-normal</p>
                <p class="text-lg font-medium text-neutral-900 dark:text-white">Medium (500) - font-medium</p>
                <p class="text-lg font-semibold text-neutral-900 dark:text-white">Semibold (600) - font-semibold</p>
                <p class="text-lg font-bold text-neutral-900 dark:text-white">Bold (700) - font-bold</p>
                <p class="text-lg font-extrabold text-neutral-900 dark:text-white">Extra Bold (800) - font-extrabold</p>
            </div>
        </x-card>
    </section>

    <!-- Text Colors -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Cores de Texto</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Paleta de cores para texto com suporte a modo escuro.
        </p>

        <x-card>
            <div class="space-y-3">
                <p class="text-base text-neutral-900 dark:text-white">Primary Text - text-neutral-900 / dark:text-white</p>
                <p class="text-base text-neutral-700 dark:text-neutral-200">Secondary Text - text-neutral-700 / dark:text-neutral-200</p>
                <p class="text-base text-neutral-600 dark:text-neutral-400">Tertiary Text - text-neutral-600 / dark:text-neutral-400</p>
                <p class="text-base text-neutral-500 dark:text-neutral-500">Muted Text - text-neutral-500 / dark:text-neutral-500</p>
                <p class="text-base text-primary">Brand Primary - text-primary</p>
                <p class="text-base text-red-600 dark:text-red-400">Error - text-red-600 / dark:text-red-400</p>
                <p class="text-base text-green-600 dark:text-green-400">Success - text-green-600 / dark:text-green-400</p>
                <p class="text-base text-yellow-600 dark:text-yellow-400">Warning - text-yellow-600 / dark:text-yellow-400</p>
                <p class="text-base text-blue-600 dark:text-blue-400">Info - text-blue-600 / dark:text-blue-400</p>
            </div>
        </x-card>
    </section>

    <!-- Text Styles -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Estilos de Texto</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Modificadores e decorações de texto.
        </p>

        <x-card>
            <div class="space-y-3">
                <p class="text-base text-neutral-900 dark:text-white italic">Itálico - italic</p>
                <p class="text-base text-neutral-900 dark:text-white underline">Sublinhado - underline</p>
                <p class="text-base text-neutral-900 dark:text-white line-through">Tachado - line-through</p>
                <p class="text-base text-neutral-900 dark:text-white uppercase">Maiúsculas - uppercase</p>
                <p class="text-base text-neutral-900 dark:text-white lowercase">MINÚSCULAS - lowercase</p>
                <p class="text-base text-neutral-900 dark:text-white capitalize">capitalize cada palavra - capitalize</p>
                <p class="text-base text-neutral-900 dark:text-white truncate max-w-xs">Texto muito longo que será truncado com reticências quando ultrapassar o limite - truncate</p>
            </div>
        </x-card>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;p class="italic"&gt;Itálico&lt;/p&gt;
&lt;p class="underline"&gt;Sublinhado&lt;/p&gt;
&lt;p class="line-through"&gt;Tachado&lt;/p&gt;
&lt;p class="uppercase"&gt;Maiúsculas&lt;/p&gt;
&lt;p class="lowercase"&gt;minúsculas&lt;/p&gt;
&lt;p class="capitalize"&gt;Capitalizado&lt;/p&gt;
&lt;p class="truncate"&gt;Truncado...&lt;/p&gt;</code></pre>
        </div>
    </section>

    <!-- Line Height -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Altura de Linha (Line Height)</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Controle o espaçamento vertical entre linhas.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-card>
                <p class="text-xs text-neutral-500 dark:text-neutral-400 mb-2">leading-tight</p>
                <p class="text-base text-neutral-900 dark:text-white leading-tight">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </x-card>

            <x-card>
                <p class="text-xs text-neutral-500 dark:text-neutral-400 mb-2">leading-normal</p>
                <p class="text-base text-neutral-900 dark:text-white leading-normal">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </x-card>

            <x-card>
                <p class="text-xs text-neutral-500 dark:text-neutral-400 mb-2">leading-relaxed</p>
                <p class="text-base text-neutral-900 dark:text-white leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </x-card>
        </div>
    </section>

    <!-- Text Alignment -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Alinhamento de Texto</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Posicionamento horizontal do texto.
        </p>

        <x-card>
            <div class="space-y-4">
                <div class="border-b border-neutral-200 dark:border-neutral-700 pb-3">
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-2">text-left</p>
                    <p class="text-base text-neutral-900 dark:text-white text-left">Texto alinhado à esquerda</p>
                </div>

                <div class="border-b border-neutral-200 dark:border-neutral-700 pb-3">
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-2">text-center</p>
                    <p class="text-base text-neutral-900 dark:text-white text-center">Texto centralizado</p>
                </div>

                <div class="border-b border-neutral-200 dark:border-neutral-700 pb-3">
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-2">text-right</p>
                    <p class="text-base text-neutral-900 dark:text-white text-right">Texto alinhado à direita</p>
                </div>

                <div>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-2">text-justify</p>
                    <p class="text-base text-neutral-900 dark:text-white text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                </div>
            </div>
        </x-card>
    </section>

    <!-- Lists -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Listas</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Estilos para listas ordenadas e não-ordenadas.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-card>
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-3">Lista Não-Ordenada</h3>
                <ul class="list-disc list-inside space-y-2 text-neutral-600 dark:text-neutral-400">
                    <li>Primeiro item da lista</li>
                    <li>Segundo item da lista</li>
                    <li>Terceiro item da lista
                        <ul class="list-circle list-inside ml-4 mt-2 space-y-1">
                            <li>Item aninhado</li>
                            <li>Outro item aninhado</li>
                        </ul>
                    </li>
                    <li>Quarto item da lista</li>
                </ul>
            </x-card>

            <x-card>
                <h3 class="font-semibold text-neutral-900 dark:text-white mb-3">Lista Ordenada</h3>
                <ol class="list-decimal list-inside space-y-2 text-neutral-600 dark:text-neutral-400">
                    <li>Primeiro passo</li>
                    <li>Segundo passo</li>
                    <li>Terceiro passo
                        <ol class="list-decimal list-inside ml-4 mt-2 space-y-1">
                            <li>Sub-passo A</li>
                            <li>Sub-passo B</li>
                        </ol>
                    </li>
                    <li>Quarto passo</li>
                </ol>
            </x-card>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;ul class="list-disc list-inside space-y-2"&gt;
    &lt;li&gt;Item 1&lt;/li&gt;
    &lt;li&gt;Item 2&lt;/li&gt;
&lt;/ul&gt;

&lt;ol class="list-decimal list-inside space-y-2"&gt;
    &lt;li&gt;Item 1&lt;/li&gt;
    &lt;li&gt;Item 2&lt;/li&gt;
&lt;/ol&gt;</code></pre>
        </div>
    </section>

    <!-- Links -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Links</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Estilos para links e âncoras.
        </p>

        <x-card>
            <div class="space-y-3">
                <p class="text-base text-neutral-900 dark:text-white">
                    Este é um <a href="#" class="text-primary hover:underline">link padrão</a> no texto.
                </p>
                <p class="text-base text-neutral-900 dark:text-white">
                    Este é um <a href="#" class="text-primary underline hover:no-underline">link sublinhado</a> no texto.
                </p>
                <p class="text-base text-neutral-900 dark:text-white">
                    Este é um <a href="#" class="text-primary font-semibold hover:text-primary-600 dark:hover:text-primary-400 transition-colors">link em negrito</a> no texto.
                </p>
                <p class="text-base text-neutral-900 dark:text-white">
                    Visite <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">nosso site</a> para mais informações.
                </p>
            </div>
        </x-card>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;a href="#" class="text-primary hover:underline"&gt;Link&lt;/a&gt;
&lt;a href="#" class="text-primary underline"&gt;Link sublinhado&lt;/a&gt;
&lt;a href="#" class="text-primary font-semibold"&gt;Link negrito&lt;/a&gt;</code></pre>
        </div>
    </section>

    <!-- Blockquotes -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Citações (Blockquotes)</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Formatos para citações e depoimentos.
        </p>

        <x-card>
            <blockquote class="border-l-4 border-primary pl-4 py-2 italic text-neutral-700 dark:text-neutral-300">
                "A simplicidade é o último grau de sofisticação."
                <footer class="mt-2 text-sm text-neutral-600 dark:text-neutral-400 not-italic">
                    — Leonardo da Vinci
                </footer>
            </blockquote>

            <blockquote class="mt-6 bg-neutral-50 dark:bg-neutral-800 border-l-4 border-blue-500 pl-4 py-3 rounded-r">
                <p class="text-neutral-700 dark:text-neutral-300 mb-2">
                    "O design não é apenas como parece e como se sente. Design é como funciona."
                </p>
                <footer class="text-sm text-neutral-600 dark:text-neutral-400">
                    — Steve Jobs
                </footer>
            </blockquote>
        </x-card>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;blockquote class="border-l-4 border-primary pl-4 italic"&gt;
    "Citação aqui..."
    &lt;footer class="text-sm not-italic"&gt;— Autor&lt;/footer&gt;
&lt;/blockquote&gt;</code></pre>
        </div>
    </section>

    <!-- Code -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Código (Code)</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Formatação para código inline e blocos de código.
        </p>

        <x-card>
            <div class="space-y-4">
                <div>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-2">Código Inline</p>
                    <p class="text-base text-neutral-900 dark:text-white">
                        Para instalar, execute <code class="px-1.5 py-0.5 bg-neutral-100 dark:bg-neutral-800 text-primary rounded text-sm font-mono">npm install</code> no terminal.
                    </p>
                </div>

                <div>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-2">Bloco de Código</p>
                    <pre class="bg-neutral-900 dark:bg-neutral-800 text-neutral-100 p-4 rounded-lg overflow-x-auto"><code class="text-sm font-mono">function exemplo() {
    console.log('Hello, World!');
    return true;
}</code></pre>
                </div>

                <div>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-2">Comando de Terminal</p>
                    <pre class="bg-neutral-900 dark:bg-neutral-800 text-green-400 p-4 rounded-lg overflow-x-auto"><code class="text-sm font-mono">$ php artisan make:controller UserController</code></pre>
                </div>
            </div>
        </x-card>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;code class="px-1.5 py-0.5 bg-neutral-100 text-primary rounded"&gt;código&lt;/code&gt;

&lt;pre class="bg-neutral-900 text-neutral-100 p-4 rounded"&gt;&lt;code&gt;
    // bloco de código
&lt;/code&gt;&lt;/pre&gt;</code></pre>
        </div>
    </section>

    <!-- Paragraphs -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Parágrafos</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Formatação de parágrafos para conteúdo de texto longo.
        </p>

        <x-card>
            <div class="prose dark:prose-invert max-w-none">
                <p class="text-neutral-600 dark:text-neutral-400 mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <p class="text-neutral-600 dark:text-neutral-400 mb-4">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p class="text-neutral-600 dark:text-neutral-400">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                </p>
            </div>
        </x-card>
    </section>

    <!-- Best Practices -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Boas Práticas</h2>

        <div class="space-y-4">
            <x-alert variant="success">
                <x-slot:title>Hierarquia Visual</x-slot:title>
                Use tamanhos e pesos de fonte para criar hierarquia clara. Títulos devem ser maiores e mais pesados que o corpo de texto.
            </x-alert>

            <x-alert variant="info">
                <x-slot:title>Legibilidade</x-slot:title>
                Para textos longos, use line-height entre 1.5 e 1.7 e largura máxima de 65-75 caracteres por linha.
            </x-alert>

            <x-alert variant="warning">
                <x-slot:title>Contraste</x-slot:title>
                Certifique-se de que há contraste suficiente entre texto e fundo para garantir acessibilidade (WCAG AA: mínimo 4.5:1).
            </x-alert>

            <x-alert variant="default">
                <x-slot:title>Consistência</x-slot:title>
                Mantenha estilos consistentes em toda a aplicação. Use as classes utilitárias documentadas aqui.
            </x-alert>
        </div>
    </section>
</div>
