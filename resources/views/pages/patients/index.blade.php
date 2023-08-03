<x-app-layout>
    <x-slot name="title">
        Catagories
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Patients
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:patients-list-component />
        </div>
    </x-app.card>
</x-app-layout>
