<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>
    @livewire('search-articles')

    
</x-app-layout>
