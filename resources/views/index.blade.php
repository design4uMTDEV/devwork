<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    @auth
        <div class="bg--light overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex items-center justify-center mt-2 mb-2">
                <x-jet-nav-link class="post-create bg--dark" href="{{ route('article_create') }}" :active="request()->routeIs('article_create')">
                    {{ __('Create a post') }}
                    <i class="fas fa-pencil-alt pl-2"></i>
                </x-jet-nav-link>
            </div>
        </div>
    @endauth
    <div class="index-hero">
        <div class="cloud-container">
            <div class="cloud-wr cloud-wr-l">
                
                <div class="cloud-icon">
                    <img src="{{ URL::to('/') }}/images/icon_comments.png" alt="icon_comments">
                </div>

                <div class="cloud-content">
                    <h1 class="cloud-text">Support others answer their technical questions by finding the right answer to yours.</h1>
                    <div class="cloud-bottom">
                        <a class="cloud-button">Explore now</a>
                    </div>
                </div>
                
            </div>
            <div class="cloud-wr cloud-wr-r">  
                <div class="cloud-content">
                    <h1 class="cloud-text">Support others answer their technical questions by finding the right answer to yours.</h1>
                    <div class="cloud-bottom">
                        <a class="cloud-button">Explore now</a>
                    </div>
                </div>
              
                <div class="cloud-icon">
                    <img src="{{ URL::to('/') }}/images/icon_lamp.png" alt="icon_lamp">
                </div>
            </div>
        </div>
        <div class="quote-container">
            <h1 class="quote-text">
                Every developer want to share opinions, knowledge and experiences.
            </h1>
        </div>
    </div>
</x-app-layout>
