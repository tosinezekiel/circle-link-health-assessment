<div>
<div class="flex justify-between">
    <div class="flex">
        <span class="font-semibold text-4xl font-bold uppercase text-gray-800 leading-tight my-10 mr-5">
            {{ __('Patients') }}
        </span>
        <a href="{{ route('patient.create') }}" class="flex flex-col justify-center">
            <x-button.primary>
                {{ __('Create') }}
            </x-button.primary>
        </a>
    </div>
    <div class="flex flex-col justify-between">
        @if($exporting && !$exportFinished)
            <div class="mr-2" wire:poll.200ms="updateExportProgress">Exporting...please wait.</div>
        @endif

        @if($exportFinished)
            <span class="mr-2">Done. Download file <a class="stretched-link" wire:click="downloadExport">here</a></span>
        @endif
        <x-button.secondary wire:click="exportData">
            {{ __('Export') }}
        </x-button.secondary>
    </div>
    
</div>

<livewire:patient.index searchable="first_name, last_name, email, date_of_birth, gender" per-page="20" />
</div>