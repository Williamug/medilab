<x-app-layout>
    <x-slot name="title">
        Catagories
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Catagories
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:catagories-list>
        </div>
    </x-app.card>
</x-app-layout>
