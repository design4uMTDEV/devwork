<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight">
            Blog / {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12 bg--light">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10 mb-10">
                <div class="image-wr">
                    <img src="/storage/{{$article->image}}" style="width:350px;" alt="$article->title">
                </div>
                <h3 class="article_title">
                    {{ $article->title }}
                </h3>
                <small class="article-date">Created on {{ date('jS M Y'), strtotime($article->created_at) }}</small>

                <small class="category">
                    {{$article->category->title}}
                </small>
                <div class="tags">
                    @if($article->tags()->count() > 0)  
                        @foreach($article->tags()->pluck('title') as $tag)
                            <small class="tag">
                                #{{$tag}}
                            </small>
                        @endforeach
                    @endif
                </div>
                @auth
                    @if($article->user()->pluck('id')[0] == auth()->user()->id)
                        <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-jet-button  class="destroy-button bg-red-500 ml-4">
                                {{ __('Delete the article') }}
                            </x-jet-button>                                
                        </form>
                    @endif
                @endauth
                <p class="article_body">
                {{ $article->body }}
                </p>
            @livewire('comments', ['article' => $article])
            </div>

            
        </div>
    </div>
</x-app-layout>
