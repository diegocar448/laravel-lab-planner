<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new
#[Layout('layouts.design-system')]
#[Title('Colors')]
class extends Component {
    //
};
?>

<div>
    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">
            Colors
        </h1>
        <p class="text-lg text-neutral-600 dark:text-neutral-400">
            Paleta de cores do sistema. Use as classes Tailwind para aplicar as cores.
        </p>
    </div>

    {{-- Usage --}}
    <div class="mb-10 p-4 bg-neutral-100 dark:bg-neutral-900 rounded-lg border border-neutral-200 dark:border-neutral-800">
        <code class="text-sm text-primary">bg-primary, text-neutral-900, border-primary-light, etc.</code>
    </div>

    <div class="space-y-12">
        {{-- Primary Colors --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Primary</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Cor principal da marca, usada para ações primárias e elementos de destaque.</p>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                <div class="space-y-2">
                    <div class="h-20 rounded-lg bg-primary-lighter border border-neutral-200 dark:border-neutral-700"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">Lighter</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#FFF0EF</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400">primary-lighter</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-20 rounded-lg bg-primary-light border border-neutral-200 dark:border-neutral-700"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">Light</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#FFE1E0</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400">primary-light</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-20 rounded-lg bg-primary"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">Base</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#F5332C</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400">primary</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-20 rounded-lg bg-primary-dark"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">Dark</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#E7231C</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400">primary-dark</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-20 rounded-lg bg-primary-darker"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">Darker</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#BF1A14</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400">primary-darker</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Overlay Colors --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Overlay</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Cores para overlays, modais e backdrops.</p>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="space-y-2">
                    <div class="h-20 rounded-lg bg-overlay"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">Base</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#BF1A14</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400">overlay</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-20 rounded-lg bg-overlay-dark border border-neutral-200 dark:border-neutral-700"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">Dark</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#00000099</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400">overlay-dark</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-20 rounded-lg bg-overlay-darker"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">Darker</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#000000CC</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400">overlay-darker</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Neutral Colors --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Neutral</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Escala de cinzas para textos, backgrounds e bordas.</p>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <div class="space-y-2">
                    <div class="h-16 rounded-lg bg-neutral-50 border border-neutral-200 dark:border-neutral-700"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">50</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#F9FAFB</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-16 rounded-lg bg-neutral-100 border border-neutral-200 dark:border-neutral-700"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">100</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#E4E7EC</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-16 rounded-lg bg-neutral-200 border border-neutral-300 dark:border-neutral-600"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">200</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#D3D7DF</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-16 rounded-lg bg-neutral-300"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">300</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#B6BDC8</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-16 rounded-lg bg-neutral-400"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">400</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#9EA5B3</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-16 rounded-lg bg-neutral-500"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">500</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#848B9A</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-16 rounded-lg bg-neutral-600"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">600</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#727988</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-16 rounded-lg bg-neutral-700"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">700</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#5A606C</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-16 rounded-lg bg-neutral-800"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">800</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#454A54</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-16 rounded-lg bg-neutral-900"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">900</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#31363F</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-16 rounded-lg bg-neutral-1000"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">1000</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#202328</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-16 rounded-lg bg-neutral-1100"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">1100</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#101114</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="h-16 rounded-lg bg-neutral-1200"></div>
                    <div>
                        <p class="text-sm font-medium text-neutral-900 dark:text-white">1200</p>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 font-mono">#090A0B</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Usage Examples --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Exemplos de Uso</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Como aplicar as cores usando classes Tailwind.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <div class="p-6 space-y-4">
                    {{-- Background --}}
                    <div>
                        <p class="text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Background</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-primary text-white text-sm rounded">bg-primary</span>
                            <span class="px-3 py-1.5 bg-primary-light text-neutral-900 text-sm rounded">bg-primary-light</span>
                            <span class="px-3 py-1.5 bg-neutral-100 dark:bg-neutral-800 text-neutral-900 dark:text-white text-sm rounded">bg-neutral-100</span>
                        </div>
                    </div>

                    {{-- Text --}}
                    <div>
                        <p class="text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Text</p>
                        <div class="flex flex-wrap gap-4">
                            <span class="text-primary font-medium">text-primary</span>
                            <span class="text-neutral-900 dark:text-white font-medium">text-neutral-900</span>
                            <span class="text-neutral-500 font-medium">text-neutral-500</span>
                        </div>
                    </div>

                    {{-- Border --}}
                    <div>
                        <p class="text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Border</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 border-2 border-primary text-neutral-900 dark:text-white text-sm rounded">border-primary</span>
                            <span class="px-3 py-1.5 border-2 border-neutral-200 dark:border-neutral-700 text-neutral-900 dark:text-white text-sm rounded">border-neutral-200</span>
                        </div>
                    </div>
                </div>

                <div class="border-t border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-950 p-4">
                    <pre class="text-sm text-neutral-700 dark:text-neutral-300 overflow-x-auto"><code>{{-- Background --}}
&lt;div class="bg-primary"&gt;...&lt;/div&gt;
&lt;div class="bg-neutral-100 dark:bg-neutral-800"&gt;...&lt;/div&gt;

{{-- Text --}}
&lt;p class="text-primary"&gt;...&lt;/p&gt;
&lt;p class="text-neutral-900 dark:text-white"&gt;...&lt;/p&gt;

{{-- Border --}}
&lt;div class="border border-primary"&gt;...&lt;/div&gt;
&lt;div class="border border-neutral-200 dark:border-neutral-800"&gt;...&lt;/div&gt;

{{-- With opacity --}}
&lt;div class="bg-primary/10"&gt;...&lt;/div&gt;
&lt;div class="bg-overlay-dark"&gt;...&lt;/div&gt;</code></pre>
                </div>
            </div>
        </section>

        {{-- Semantic Usage --}}
        <section>
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Uso Semântico</h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Recomendações de uso das cores no sistema.</p>

            <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-neutral-50 dark:bg-neutral-950">
                        <tr>
                            <th class="text-left px-4 py-3 font-semibold text-neutral-900 dark:text-white">Contexto</th>
                            <th class="text-left px-4 py-3 font-semibold text-neutral-900 dark:text-white">Light Mode</th>
                            <th class="text-left px-4 py-3 font-semibold text-neutral-900 dark:text-white">Dark Mode</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-800">
                        <tr>
                            <td class="px-4 py-3 text-neutral-900 dark:text-white">Background página</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">bg-neutral-50</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">bg-neutral-1100</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-neutral-900 dark:text-white">Background card</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">bg-white</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">bg-neutral-900</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-neutral-900 dark:text-white">Background sidebar</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">bg-white</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">bg-neutral-1000</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-neutral-900 dark:text-white">Texto principal</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">text-neutral-900</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">text-white</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-neutral-900 dark:text-white">Texto secundário</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">text-neutral-600</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">text-neutral-400</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-neutral-900 dark:text-white">Texto muted</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">text-neutral-500</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">text-neutral-500</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-neutral-900 dark:text-white">Borda card</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">border-neutral-200</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">border-neutral-800</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-neutral-900 dark:text-white">Borda divider</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">border-neutral-100</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">border-neutral-900</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-neutral-900 dark:text-white">Hover background</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">hover:bg-neutral-100</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">hover:bg-neutral-800</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-neutral-900 dark:text-white">Ação primária</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">bg-primary</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">bg-primary</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-neutral-900 dark:text-white">Modal overlay</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">bg-overlay-dark</td>
                            <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-mono text-xs">bg-overlay-darker</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
