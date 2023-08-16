<x-app-layout>
    <x-slot name="title">
        Service Categories
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Service Categories
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:service-category-list-component />
        </div>
    </x-app.card>
</x-app-layout>
