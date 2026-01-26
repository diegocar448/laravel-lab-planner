<?php

use App\Enums\DiagnosisItemTypeEnum;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Title;
use Symfony\Component\HttpFoundation\StreamedResponse;

new
#[Title('Admin - Usuários')]
class extends Component {
    #[Computed]
    public function users()
    {
        return User::query()
            ->with(['goals.diagnoses.diagnosisItems'])
            ->orderBy('name')
            ->get();
    }

    public function exportCsv(): StreamedResponse
    {
        $users = $this->users;

        return response()->streamDownload(function () use ($users) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'Nome',
                'Email',
                'Telefone',
                'Diagnóstico',
                'Sou Bom Em',
                'Preciso Melhorar Em',
            ], ';');

            foreach ($users as $user) {
                $diagnosis = $user->goals
                    ->flatMap(fn ($goal) => $goal->diagnoses)
                    ->first();

                $diagnosisDescription = $diagnosis?->description ?? '';

                $doingWellItems = '';
                $needToImproveItems = '';

                if ($diagnosis) {
                    $doingWellItems = $diagnosis->diagnosisItems
                        ->filter(fn ($item) => $item->diagnosis_item_type_id === DiagnosisItemTypeEnum::DoingWell)
                        ->pluck('description')
                        ->implode(' | ');

                    $needToImproveItems = $diagnosis->diagnosisItems
                        ->filter(fn ($item) => $item->diagnosis_item_type_id === DiagnosisItemTypeEnum::NeedToImprove)
                        ->pluck('description')
                        ->implode(' | ');
                }

                fputcsv($handle, [
                    $user->name,
                    $user->email,
                    $user->phone,
                    $diagnosisDescription,
                    $doingWellItems,
                    $needToImproveItems,
                ], ';');
            }

            fclose($handle);
        }, 'usuarios-' . now()->format('Y-m-d') . '.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
};
?>

<div class="p-8">
    <div class="max-w-6xl">
        <div class="flex flex-row justify-between items-center mb-8">
            <div class="flex flex-col">
                <h1 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">
                    Administração - Usuários
                </h1>
                <p class="text-neutral-600 dark:text-neutral-400">
                    Gerencie e exporte os dados dos usuários.
                </p>
            </div>

            <x-button
                wire:click="exportCsv"
                variant="primary"
                class="cursor-pointer"
            >
                <x-slot:iconLeft>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                    </svg>
                </x-slot:iconLeft>
                Exportar CSV
            </x-button>
        </div>

        <x-card>
            <x-table>
                <x-table.head>
                    <x-table.row>
                        <x-table.header>Nome</x-table.header>
                        <x-table.header>Email</x-table.header>
                        <x-table.header>Telefone</x-table.header>
                        <x-table.header>Admin</x-table.header>
                        <x-table.header>Diagnóstico</x-table.header>
                    </x-table.row>
                </x-table.head>
                <x-table.body>
                    @forelse($this->users as $user)
                        <x-table.row wire:key="user-{{ $user->id }}">
                            <x-table.cell>{{ $user->name }}</x-table.cell>
                            <x-table.cell>{{ $user->email }}</x-table.cell>
                            <x-table.cell>{{ $user->phone ?? '-' }}</x-table.cell>
                            <x-table.cell>
                                @if($user->is_admin)
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                        Sim
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full bg-neutral-100 text-neutral-800 dark:bg-neutral-700 dark:text-neutral-300">
                                        Não
                                    </span>
                                @endif
                            </x-table.cell>
                            <x-table.cell>
                                @if($user->diagnosis_created_at)
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                        Criado
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full bg-neutral-100 text-neutral-800 dark:bg-neutral-700 dark:text-neutral-300">
                                        Pendente
                                    </span>
                                @endif
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="5" class="text-center text-neutral-500">
                                Nenhum usuário encontrado.
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-table.body>
            </x-table>
        </x-card>
    </div>
</div>
