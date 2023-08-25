<x-app-layout>
    <x-slot name="title">
        Spacemens
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Spacemens
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:spacemen-component />
        </div>
    </x-app.card>
</x-app-layout>
