<x-app-layout>
    <x-slot name="title">
        Categories
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Categories
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:service-category-list-component />
        </div>
    </x-app.card>
</x-app-layout>
