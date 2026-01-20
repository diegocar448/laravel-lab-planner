<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Layout('layouts.design-system')]
#[Title('Alerts')]
class extends Component {};
?>

<div>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">Alerts</h1>
        <p class="text-neutral-600 dark:text-neutral-400">Componentes para exibir mensagens de feedback e notificações</p>
    </div>

    <!-- Basic Alerts -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Variantes Básicas</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Alerts com diferentes cores para diferentes tipos de mensagens.
        </p>

        <div class="space-y-4">
            <x-alert variant="success">
                Operação realizada com sucesso!
            </x-alert>

            <x-alert variant="error">
                Ocorreu um erro ao processar sua solicitação.
            </x-alert>

            <x-alert variant="warning">
                Atenção: Esta ação não pode ser desfeita.
            </x-alert>

            <x-alert variant="info">
                Novos recursos foram adicionados à plataforma.
            </x-alert>

            <x-alert variant="default">
                Esta é uma mensagem informativa padrão.
            </x-alert>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-alert variant="success"&gt;Mensagem...&lt;/x-alert&gt;
&lt;x-alert variant="error"&gt;Mensagem...&lt;/x-alert&gt;
&lt;x-alert variant="warning"&gt;Mensagem...&lt;/x-alert&gt;
&lt;x-alert variant="info"&gt;Mensagem...&lt;/x-alert&gt;
&lt;x-alert variant="default"&gt;Mensagem...&lt;/x-alert&gt;</code></pre>
        </div>
    </section>

    <!-- Alerts with Title -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Alerts com Título</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Adicione um título para destacar a mensagem principal.
        </p>

        <div class="space-y-4">
            <x-alert variant="success">
                <x-slot:title>Sucesso!</x-slot:title>
                Seu perfil foi atualizado com sucesso.
            </x-alert>

            <x-alert variant="error">
                <x-slot:title>Erro de Validação</x-slot:title>
                Por favor, verifique os campos obrigatórios e tente novamente.
            </x-alert>

            <x-alert variant="warning">
                <x-slot:title>Atenção</x-slot:title>
                Você está prestes a excluir permanentemente este item.
            </x-alert>

            <x-alert variant="info">
                <x-slot:title>Dica</x-slot:title>
                Você pode usar atalhos do teclado para navegar mais rapidamente.
            </x-alert>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-alert variant="success"&gt;
    &lt;x-slot:title&gt;Sucesso!&lt;/x-slot:title&gt;
    Seu perfil foi atualizado.
&lt;/x-alert&gt;</code></pre>
        </div>
    </section>

    <!-- Dismissible Alerts -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Alerts Dismissible</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Alerts que podem ser fechados pelo usuário.
        </p>

        <div class="space-y-4">
            <x-alert variant="success" :dismissible="true">
                <x-slot:title>Parabéns!</x-slot:title>
                Sua conta foi verificada com sucesso.
            </x-alert>

            <x-alert variant="info" :dismissible="true">
                Lembre-se de salvar suas alterações antes de sair.
            </x-alert>

            <x-alert variant="warning" :dismissible="true">
                <x-slot:title>Aviso de Manutenção</x-slot:title>
                O sistema entrará em manutenção às 23:00.
            </x-alert>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-alert variant="success" :dismissible="true"&gt;
    &lt;x-slot:title&gt;Parabéns!&lt;/x-slot:title&gt;
    Sua conta foi verificada.
&lt;/x-alert&gt;</code></pre>
        </div>
    </section>

    <!-- Alerts with Actions -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Alerts com Ações</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Adicione botões de ação aos seus alerts.
        </p>

        <div class="space-y-4">
            <x-alert variant="info" :dismissible="true">
                <x-slot:title>Nova Atualização Disponível</x-slot:title>
                Uma nova versão do aplicativo está disponível para download.

                <x-slot:actions>
                    <x-button size="xs" variant="primary">Atualizar Agora</x-button>
                    <x-button size="xs" variant="ghost">Mais Tarde</x-button>
                </x-slot:actions>
            </x-alert>

            <x-alert variant="warning">
                <x-slot:title>Confirmar Exclusão</x-slot:title>
                Tem certeza de que deseja excluir este item? Esta ação não pode ser desfeita.

                <x-slot:actions>
                    <x-button size="xs" variant="danger">Confirmar</x-button>
                    <x-button size="xs" variant="tertiary">Cancelar</x-button>
                </x-slot:actions>
            </x-alert>

            <x-alert variant="success">
                <x-slot:title>Backup Concluído</x-slot:title>
                O backup dos seus dados foi realizado com sucesso.

                <x-slot:actions>
                    <x-button size="xs" variant="outline">Ver Detalhes</x-button>
                </x-slot:actions>
            </x-alert>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-alert variant="info"&gt;
    &lt;x-slot:title&gt;Título&lt;/x-slot:title&gt;
    Mensagem do alert...

    &lt;x-slot:actions&gt;
        &lt;x-button size="xs"&gt;Ação&lt;/x-button&gt;
    &lt;/x-slot:actions&gt;
&lt;/x-alert&gt;</code></pre>
        </div>
    </section>

    <!-- Alerts without Icon -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Alerts sem Ícone</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Remova o ícone para um visual mais minimalista.
        </p>

        <div class="space-y-4">
            <x-alert variant="success" :icon="false">
                <x-slot:title>Operação Concluída</x-slot:title>
                Todas as alterações foram salvas com sucesso.
            </x-alert>

            <x-alert variant="info" :icon="false">
                Este é um alert informativo sem ícone.
            </x-alert>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-alert variant="success" :icon="false"&gt;
    Mensagem sem ícone...
&lt;/x-alert&gt;</code></pre>
        </div>
    </section>

    <!-- Bordered Alerts -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Alerts com Borda</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Adicione uma borda para maior destaque visual.
        </p>

        <div class="space-y-4">
            <x-alert variant="success" :bordered="true">
                <x-slot:title>Pagamento Aprovado</x-slot:title>
                Seu pagamento foi processado com sucesso.
            </x-alert>

            <x-alert variant="error" :bordered="true">
                <x-slot:title>Acesso Negado</x-slot:title>
                Você não tem permissão para acessar este recurso.
            </x-alert>

            <x-alert variant="warning" :bordered="true">
                <x-slot:title>Sessão Expirando</x-slot:title>
                Sua sessão irá expirar em 5 minutos.
            </x-alert>

            <x-alert variant="info" :bordered="true">
                <x-slot:title>Novo Recurso</x-slot:title>
                Experimente o novo painel de controle.
            </x-alert>
        </div>

        <div class="mt-6 bg-neutral-900 dark:bg-neutral-800 rounded-lg p-4">
            <pre class="text-sm text-neutral-100"><code>&lt;x-alert variant="success" :bordered="true"&gt;
    &lt;x-slot:title&gt;Título&lt;/x-slot:title&gt;
    Mensagem...
&lt;/x-alert&gt;</code></pre>
        </div>
    </section>

    <!-- Advanced Examples -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Exemplos Avançados</h2>
        <p class="text-neutral-600 dark:text-neutral-400 mb-6">
            Combinações e casos de uso práticos.
        </p>

        <div class="space-y-4">
            <!-- Multi-line Alert -->
            <x-alert variant="error" :dismissible="true" :bordered="true">
                <x-slot:title>Erros de Validação</x-slot:title>
                <div>
                    <p class="mb-2">Os seguintes erros foram encontrados:</p>
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        <li>O campo email é obrigatório</li>
                        <li>A senha deve ter no mínimo 8 caracteres</li>
                        <li>Os campos de senha não coincidem</li>
                    </ul>
                </div>
            </x-alert>

            <!-- Success with link -->
            <x-alert variant="success" :dismissible="true">
                <x-slot:title>Convite Enviado</x-slot:title>
                O convite foi enviado para <strong>usuario@exemplo.com</strong>.
                <a href="#" class="underline font-medium">Reenviar convite</a>
            </x-alert>

            <!-- Complex action alert -->
            <x-alert variant="warning" :bordered="true">
                <x-slot:title>Armazenamento Quase Cheio</x-slot:title>
                <div>
                    <p class="mb-2">Você está usando 95% do seu espaço de armazenamento.</p>
                    <div class="w-full bg-yellow-200 dark:bg-yellow-900 rounded-full h-2 mb-3">
                        <div class="bg-yellow-500 dark:bg-yellow-500 h-2 rounded-full" style="width: 95%"></div>
                    </div>
                </div>

                <x-slot:actions>
                    <x-button size="xs" variant="primary">Fazer Upgrade</x-button>
                    <x-button size="xs" variant="tertiary">Gerenciar Arquivos</x-button>
                </x-slot:actions>
            </x-alert>

            <!-- Minimal notification -->
            <x-alert variant="default" :icon="false" :dismissible="true">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    <span>Sistema online - Todos os serviços operando normalmente</span>
                </div>
            </x-alert>
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
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Descrição</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-neutral-900 divide-y divide-neutral-200 dark:divide-neutral-700">
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900 dark:text-white">variant</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">string</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">info</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">success, error, warning, info, default</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">Define o tipo e cor do alert</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900 dark:text-white">dismissible</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">boolean</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">false</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">true, false</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">Permite fechar o alert</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900 dark:text-white">icon</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">boolean</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">true</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">true, false</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">Exibe ícone do tipo de alert</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900 dark:text-white">bordered</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">boolean</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">false</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">true, false</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">Adiciona borda ao alert</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-card>
    </section>

    <!-- Slots Table -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-neutral-900 dark:text-white mb-4">Slots Disponíveis</h2>

        <x-card padding="none">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-neutral-50 dark:bg-neutral-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Slot</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Descrição</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-neutral-900 divide-y divide-neutral-200 dark:divide-neutral-700">
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900 dark:text-white">default</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">Conteúdo principal do alert</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900 dark:text-white">title</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">Título do alert (opcional)</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900 dark:text-white">actions</td>
                            <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">Botões de ação (opcional)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-card>
    </section>
</div>
