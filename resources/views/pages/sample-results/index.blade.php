<x-app-layout>
    <x-slot name="title">
        Patient's Results
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Results from the sample taken
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:patients-list-component />
        </div>
    </x-app.card>
</x-app-layout>
