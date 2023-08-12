<x-app-layout>
    <x-slot name="title">
        Accounts
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Accounts
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:accounting-list-component />
        </div>
    </x-app.card>
</x-app-layout>
