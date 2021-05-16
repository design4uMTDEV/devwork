<div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10 mb-10">
        <div class="image-wr">
            <img src="/storage/{{$article->image}}" style="width:350px;" alt="$article->title">
        </div>
        <h3 class="article_title">
            {{ $article->title }}
        </h3>
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
               <div class="flex mt-2">
               
                    <x-jet-button wire:click="editShowModal" class="destroy-button ml-4">
                        <i class="far fa-edit"></i>{{ __('Edit') }}
                    </x-jet-button>                                
                  
                    <x-jet-button wire:click="deleteShowModal" class="destroy-button bg-red-500 ml-4">
                        <i class="far fa-trash-alt"></i>{{ __('Delete') }}
                    </x-jet-button>                                
            
                </div>

                <!-- Modal form delete -->
                <!-- Modal form -->
                <x-jet-dialog-modal wire:model="deleteModalFormVisible">
                    <x-slot name="title">
                        {{ __('Delete this article') }}
                    </x-slot>

                    <x-slot name="content">
                        Do you want to delete this article?
                    </x-slot>

                    <x-jet-validation-errors class="mb-4" />    
         
                    
                    <x-slot name="footer">
                        <div class="flex">
                            <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-jet-button  class="bg-red-500 mr-2">
                                <i class="fas fa-trash-alt"></i>{{ __('Delete') }}
                                </x-jet-button>                                
                            </form>
                            <x-jet-secondary-button wire:click="$toggle('deleteModalFormVisible')" wire:loading.attr="disabled">
                                {{ __('Close') }}
                            </x-jet-secondary-button>
                        </div>
                    </x-slot>
                </x-jet-dialog-modal>

                <!-- Modal form edit -->
                <x-jet-dialog-modal wire:model="modalFormVisible">
                    <x-slot name="title">
                        {{ __('Edit the article') }}
                    </x-slot>

                    <x-slot name="content">
                        
                        
                    <x-jet-validation-errors class="mb-4" />    

                    @if ($image)
                        Photo Preview:
                        <img width="150px" src="{{ $image->temporaryUrl() }}">
                    @elseif($article != null)
                        <img src="/storage/{{ $article->image }}" style="width:150px;" alt=" {{$article->title}}" srcset="">
                    @endif

                    <input class="custom-file-input" type="file" wire:model="image">

                    <br/>
                    <x-jet-button  wire:click="updateImage" class="ml-4">
                            {{ __('Upload image') }}
                        </x-jet-button>
                    <br/>
                    <form method="POST" action="{{ route('article.update', $article->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mt-4">
                            <x-jet-label for="title" value="Title" />
                            <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title') ?? $article->title }}" autofocus autocomplete="title"/>
                        </div>
                        
                        <div class="mt-4">
                            <x-jet-label for="excerpt" value="Excerpt" />
                            <x-jet-input id="excerpt" class="block mt-1 w-full" type="text" name="excerpt" value="{{ old('excerpt') ?? $article->excerpt }}" autocomplete="excerpt"/>
                        </div>
                        
                        <div class="mt-4">
                            <x-jet-label for="body" value="Body" />                
                            <textarea  id="body" class="block mt-1 w-full" type="text" name="body"  rows="4" cols="50" autocomplete="body">{{$article->body}}</textarea>
                        </div>

                        <x-jet-button class="ml-4 mt-4">
                            {{ __('Update') }}
                        </x-jet-button>
                        <div>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                    <form>
                        
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                            {{ __('Close') }}
                        </x-jet-secondary-button>
                    </x-slot>
                </x-jet-dialog-modal>

            @endif
        @endauth
        <p class="article_body">
        {{ $article->body }}
        </p>
        @livewire('comments', ['article' => $article])
    </div>
</div>
