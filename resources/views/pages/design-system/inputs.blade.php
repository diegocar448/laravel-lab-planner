<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Component;
new
#[Layout('layouts.design-system')]
#[Title('Inputs - Design System')]
class extends Component {
    public string $name = '';
    public string $email = '';
    public string $country = '';
    public string $bio = '';
    public bool $newsletter = false;
    public bool $terms = false;
}; ?>

<div>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-neutral-900 dark:text-white">Form Inputs</h1>
        <p class="mt-2 text-neutral-600 dark:text-neutral-400">
            Componentes de formulário preparados para validação Laravel com suporte completo a dark mode.
        </p>
    </div>

    {{-- Text Input --}}
    <section class="mb-12">
        <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4">Text Input</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Input de texto com suporte a labels, placeholders, ícones, prefixos/sufixos e estados de erro.
        </p>

        <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 mb-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form.input
                    name="name"
                    label="Nome completo"
                    placeholder="Digite seu nome"
                    wire:model="name"
                />

                <x-form.input
                    type="email"
                    name="email"
                    label="E-mail"
                    placeholder="seu@email.com"
                    hint="Nunca compartilharemos seu e-mail."
                    wire:model="email"
                />

                <x-form.input
                    name="website"
                    label="Website"
                    placeholder="exemplo.com"
                    prefix="https://"
                />

                <x-form.input
                    name="price"
                    label="Preço"
                    placeholder="0,00"
                    prefix="R$"
                    suffix="/mês"
                />
            </div>
        </div>

        <div class="bg-neutral-900 dark:bg-neutral-950 rounded-lg p-4 overflow-x-auto">
            <pre class="text-sm text-neutral-300"><code>&lt;x-form.input
    name="name"
    label="Nome completo"
    placeholder="Digite seu nome"
    wire:model="name"
/&gt;

&lt;x-form.input
    type="email"
    name="email"
    label="E-mail"
    placeholder="seu@email.com"
    hint="Nunca compartilharemos seu e-mail."
/&gt;

&lt;x-form.input
    name="website"
    label="Website"
    placeholder="exemplo.com"
    prefix="https://"
/&gt;</code></pre>
        </div>
    </section>

    {{-- Input Sizes --}}
    <section class="mb-12">
        <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4">Tamanhos</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Três tamanhos disponíveis: <code class="text-primary">sm</code>, <code class="text-primary">md</code> (padrão) e <code class="text-primary">lg</code>.
        </p>

        <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 mb-4">
            <div class="space-y-4 max-w-md">
                <x-form.input
                    name="small"
                    label="Small"
                    placeholder="Input pequeno"
                    size="sm"
                />

                <x-form.input
                    name="medium"
                    label="Medium (padrão)"
                    placeholder="Input médio"
                    size="md"
                />

                <x-form.input
                    name="large"
                    label="Large"
                    placeholder="Input grande"
                    size="lg"
                />
            </div>
        </div>
    </section>

    {{-- Input States --}}
    <section class="mb-12">
        <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4">Estados</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Estados de disabled, readonly e required.
        </p>

        <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 mb-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <x-form.input
                    name="disabled_input"
                    label="Disabled"
                    placeholder="Input desabilitado"
                    :disabled="true"
                />

                <x-form.input
                    name="readonly_input"
                    label="Readonly"
                    value="Valor fixo"
                    :readonly="true"
                />

                <x-form.input
                    name="required_input"
                    label="Required"
                    placeholder="Campo obrigatório"
                    :required="true"
                />
            </div>
        </div>
    </section>

    {{-- Error State --}}
    <section class="mb-12">
        <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4">Estado de Erro</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            O componente detecta automaticamente erros de validação Laravel através do nome do campo.
        </p>

        <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 mb-4">
            <div class="max-w-md">
                {{-- Simulated error state --}}
                <div class="w-full">
                    <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1.5">
                        E-mail
                        <span class="text-primary ml-0.5">*</span>
                    </label>
                    <input
                        type="email"
                        placeholder="seu@email.com"
                        value="email-invalido"
                        class="block w-full rounded-lg border px-4 py-2.5 text-sm bg-white dark:bg-neutral-900 text-neutral-900 dark:text-neutral-100 border-red-500 dark:border-red-400 focus:border-red-500 focus:ring-red-500/20 focus:outline-none focus:ring-2"
                    />
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1">
                        O campo e-mail deve ser um endereço de e-mail válido.
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-neutral-900 dark:bg-neutral-950 rounded-lg p-4 overflow-x-auto">
            <pre class="text-sm text-neutral-300"><code>{{-- Erro detectado automaticamente via $errors --}}
&lt;x-form.input
    type="email"
    name="email"
    label="E-mail"
    :required="true"
/&gt;

{{-- No controller/Livewire --}}
$this->validate([
    'email' => 'required|email',
]);</code></pre>
        </div>
    </section>

    {{-- Select --}}
    <section class="mb-12">
        <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4">Select</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Componente select com suporte a options via prop ou slot.
        </p>

        <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 mb-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form.select
                    name="country"
                    label="País"
                    placeholder="Selecione um país"
                    :options="['br' => 'Brasil', 'us' => 'Estados Unidos', 'pt' => 'Portugal', 'es' => 'Espanha']"
                    wire:model="country"
                />

                <x-form.select
                    name="status"
                    label="Status"
                    placeholder="Selecione o status"
                    hint="Selecione o status atual do item."
                >
                    <option value="draft">Rascunho</option>
                    <option value="published">Publicado</option>
                    <option value="archived">Arquivado</option>
                </x-form.select>

                <x-form.select
                    name="disabled_select"
                    label="Select Desabilitado"
                    placeholder="Não disponível"
                    :disabled="true"
                />

                <x-form.select
                    name="required_select"
                    label="Select Obrigatório"
                    placeholder="Selecione uma opção"
                    :required="true"
                    :options="['a' => 'Opção A', 'b' => 'Opção B']"
                />
            </div>
        </div>

        <div class="bg-neutral-900 dark:bg-neutral-950 rounded-lg p-4 overflow-x-auto">
            <pre class="text-sm text-neutral-300"><code>{{-- Via prop options --}}
&lt;x-form.select
    name="country"
    label="País"
    placeholder="Selecione um país"
    :options="['br' => 'Brasil', 'us' => 'Estados Unidos']"
/&gt;

{{-- Via slot --}}
&lt;x-form.select name="status" label="Status"&gt;
    &lt;option value="draft"&gt;Rascunho&lt;/option&gt;
    &lt;option value="published"&gt;Publicado&lt;/option&gt;
&lt;/x-form.select&gt;</code></pre>
        </div>
    </section>

    {{-- Textarea --}}
    <section class="mb-12">
        <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4">Textarea</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Área de texto com controle de linhas e redimensionamento.
        </p>

        <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 mb-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-form.textarea
                    name="bio"
                    label="Biografia"
                    placeholder="Conte um pouco sobre você..."
                    hint="Máximo de 500 caracteres."
                    wire:model="bio"
                />

                <x-form.textarea
                    name="notes"
                    label="Notas (sem resize)"
                    placeholder="Suas anotações..."
                    resize="none"
                    :rows="4"
                />

                <x-form.textarea
                    name="description"
                    label="Descrição (6 linhas)"
                    placeholder="Descrição detalhada..."
                    :rows="6"
                    :required="true"
                />

                <x-form.textarea
                    name="disabled_textarea"
                    label="Textarea Desabilitado"
                    placeholder="Não editável"
                    :disabled="true"
                />
            </div>
        </div>

        <div class="bg-neutral-900 dark:bg-neutral-950 rounded-lg p-4 overflow-x-auto">
            <pre class="text-sm text-neutral-300"><code>&lt;x-form.textarea
    name="bio"
    label="Biografia"
    placeholder="Conte um pouco sobre você..."
    hint="Máximo de 500 caracteres."
    :rows="4"
    resize="vertical" {{-- none, vertical, horizontal, both --}}
/&gt;</code></pre>
        </div>
    </section>

    {{-- Checkbox --}}
    <section class="mb-12">
        <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4">Checkbox</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Checkbox com suporte a label e descrição.
        </p>

        <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 mb-4">
            <div class="space-y-6">
                <x-form.checkbox
                    name="newsletter"
                    label="Receber newsletter"
                    description="Receba novidades e atualizações por e-mail."
                    wire:model="newsletter"
                />

                <x-form.checkbox
                    name="terms"
                    label="Aceito os termos de uso"
                    wire:model="terms"
                />

                <x-form.checkbox
                    name="checked"
                    label="Checkbox marcado"
                    description="Este checkbox já está marcado."
                    :checked="true"
                />

                <x-form.checkbox
                    name="disabled_checkbox"
                    label="Checkbox desabilitado"
                    description="Este checkbox não pode ser alterado."
                    :disabled="true"
                />

                <div class="flex gap-8">
                    <x-form.checkbox name="sm" label="Small" size="sm" />
                    <x-form.checkbox name="md" label="Medium" size="md" />
                    <x-form.checkbox name="lg" label="Large" size="lg" />
                </div>
            </div>
        </div>

        <div class="bg-neutral-900 dark:bg-neutral-950 rounded-lg p-4 overflow-x-auto">
            <pre class="text-sm text-neutral-300"><code>&lt;x-form.checkbox
    name="newsletter"
    label="Receber newsletter"
    description="Receba novidades e atualizações por e-mail."
    wire:model="newsletter"
/&gt;

&lt;x-form.checkbox
    name="terms"
    label="Aceito os termos de uso"
    :checked="true"
    size="md" {{-- sm, md, lg --}}
/&gt;</code></pre>
        </div>
    </section>

    {{-- Props Reference --}}
    <section>
        <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4">Referência de Props</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-neutral-200 dark:border-neutral-800">
                        <th class="text-left py-3 px-4 font-medium text-neutral-900 dark:text-white">Componente</th>
                        <th class="text-left py-3 px-4 font-medium text-neutral-900 dark:text-white">Props</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-200 dark:divide-neutral-800">
                    <tr>
                        <td class="py-3 px-4 text-neutral-900 dark:text-white font-mono">x-form.input</td>
                        <td class="py-3 px-4 text-neutral-600 dark:text-neutral-400">
                            type, name, id, label, placeholder, hint, required, disabled, readonly, size, iconLeft, iconRight, prefix, suffix, bag
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4 text-neutral-900 dark:text-white font-mono">x-form.select</td>
                        <td class="py-3 px-4 text-neutral-600 dark:text-neutral-400">
                            name, id, label, placeholder, hint, required, disabled, size, options, bag
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4 text-neutral-900 dark:text-white font-mono">x-form.textarea</td>
                        <td class="py-3 px-4 text-neutral-600 dark:text-neutral-400">
                            name, id, label, placeholder, hint, required, disabled, readonly, rows, resize, bag
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4 text-neutral-900 dark:text-white font-mono">x-form.checkbox</td>
                        <td class="py-3 px-4 text-neutral-600 dark:text-neutral-400">
                            name, id, label, description, checked, disabled, size, bag
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4 text-neutral-900 dark:text-white font-mono">x-form.label</td>
                        <td class="py-3 px-4 text-neutral-600 dark:text-neutral-400">
                            for, required
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4 text-neutral-900 dark:text-white font-mono">x-form.error</td>
                        <td class="py-3 px-4 text-neutral-600 dark:text-neutral-400">
                            name, bag
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4 text-neutral-900 dark:text-white font-mono">x-form.hint</td>
                        <td class="py-3 px-4 text-neutral-600 dark:text-neutral-400">
                            (apenas slot)
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
