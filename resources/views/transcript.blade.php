<x-app-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

  @livewire("submit")

    </x-jet-authentication-card>
    @livewireScripts()
</x-app-layout>
