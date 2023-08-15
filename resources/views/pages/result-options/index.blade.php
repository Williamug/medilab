<x-app-layout>
    <x-slot name="title">
        Results Options
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Results Options
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:result-option-list-component />
        </div>
    </x-app.card>
</x-app-layout>
