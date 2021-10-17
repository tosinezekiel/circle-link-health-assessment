
<div class="flex justify-between">
    <div class="w-full rounded-lg bg-white overflow-hidden w-full block p-2">
        <div class="flex justify-between">
            <h2 class="text-4xl font-bold text-gray-900 uppercase mb-4">{{ $patient->first_name }}</h2>
            <a href="{{ route('patient.home') }}" class="text-xl text-gray-900 capitalize underline">{{ __('home') }}</a>
        </div>

        <x-input.group for="upper" label="First Name (mmHg):" :error="$errors->first('upper')">
            <x-input.text wire:model.lazy="upper" id="upper" placeholder="Upper" />
        </x-input.group>
    
        <x-input.group for="lower" label="Last Name (mmHg):" :error="$errors->first('lower')">
            <x-input.text wire:model.lazy="lower" id="lower" placeholder="Lower" />
        </x-input.group>

        <div class="mt-8 text-right flex">
            <x-button.primary wire:click="save" type="button">
                Save
            </x-button.primary>
            @if($message) <span class="ml-1 text-green-800 self-center">{{ $message }}</span> @endif
        </div>
    </div>
</div>

