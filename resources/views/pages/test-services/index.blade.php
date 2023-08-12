<x-app-layout>
    <x-slot name="title">
        Lab Services
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Lab Services
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:test-service-list-component />
        </div>
    </x-app.card>
</x-app-layout>
