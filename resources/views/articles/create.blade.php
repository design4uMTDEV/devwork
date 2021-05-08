    

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight">
            Article creation
        </h2>
    </x-slot>

    <x-jet-authentication-card>
            <x-slot name="logo">
                
            </x-slot>
            
            <h3 class="font-semibold text-gray-800 leading-tight">Create a new article</h3>
            
            @livewire('create-post')
        
    </x-jet-authentication-card>
</x-app-layout>