<x-app-layout>
    <x-slot name="title">
        Patient Waiting List
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Patient Waiting List
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:waiting-list-component />
        </div>
    </x-app.card>
</x-app-layout>
