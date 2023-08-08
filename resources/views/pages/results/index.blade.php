<x-app-layout>
    <x-slot name="title">
        Results
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            Results
        </x-slot>
        <x-app.flash-message />
        <div>
            <livewire:results-list-component>
        </div>
    </x-app.card>
</x-app-layout>
