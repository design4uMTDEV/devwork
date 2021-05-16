<div>


    <div class="py-12 bg--light">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-5">
            <x-jet-label for="search" value="{{ __('Search for a topic') }}" />
            <x-jet-input wire:model="search" id="search" placeholder="Type keywords like: error, javascript, frontend ..." class="block mt-1 w-full" type="text" name="search" :value="old('search')" required autofocus />
        </div>
            @foreach($articles as $article)
            <div class="bg-white overflow-hidden shadow-xl flex sm:rounded-lg p-10 mb-10">
                @if($article->image != null)
                <div class="image-wr">
                    <img src="/storage/{{$article->image}}" style="width:150px;" alt="$article->title">
                </div>
                @endif
                <div class="article-text">
                    <a href="/blog/{{$article->id}}" class="article_title">
                        {{ $article->title }}
                    </a>
                    <div class="article_user">
                        <div class="image-wr">
                            <img src="{{ $article->user->profile_photo_url }}" class="sm--prof-img" alt="$article->title">
                        </div>
                        <small class="article_user-name" >
                            {{ $article->user()->pluck('username')[0] }}
                        </small>
                        <div class="dot">&nbsp;&bull;</div>
                        <small class="article-date">Created on {{ date('jS M Y'), strtotime($article->created_at) }}</small>

                    </div>
                    <p class="article_excerpt">
                    {{ $article->excerpt }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="pagination">
        {{ $articles->links() }}    
    </div>
</div>
