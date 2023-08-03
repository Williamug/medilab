<x-app-layout>
    <x-slot name="title">
        Test Services
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Test Services
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:test-service-list-component />
        </div>
    </x-app.card>
</x-app-layout>
