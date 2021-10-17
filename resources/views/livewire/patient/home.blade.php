<div>
    <div class="flex justify-between">
        <span class="font-semibold text-4xl font-bold uppercase text-gray-800 leading-tight my-10 mr-5">
            {{ __('Patients') }}
        </span>
        <a href="{{ route('patient.create') }}" class="flex flex-col justify-center">
            <x-button.primary>
                {{ __('Create') }}
            </x-button.primary>
        </a>
        
        
    </div>

    <livewire:patient.index searchable="first_name, last_name, email, date_of_birth, gender" per-page="20" />

    <div class="flex justify-start items-center">
        <x-button.secondary wire:click="exportData" class="mr-2">
            {{ __('Export') }}
        </x-button.secondary>

        @if($exporting && !$exportFinished)
            <div class="mr-2" wire:poll.200="updateExportProgress">Exporting, please wait.</div>
        @endif
    
        @if($exportFinished)
            <span class="mr-2 text-green-500">Done. Download file <a class="cursor-pointer" wire:click="downloadExport">here</a></span>
        @endif
    </div>
</div>