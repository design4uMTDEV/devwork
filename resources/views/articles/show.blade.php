<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight">
            Blog / {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12 bg--light">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('article-component', ['article' => $article])
            

            
        </div>
    </div>
</x-app-layout>
