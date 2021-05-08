<div>


<x-jet-validation-errors class="mb-4" />    
    @auth
    <div class="mt-4">
        <x-jet-label for="text" value="Write a comment" />
        <x-jet-input id="text" class="block mt-1 w-full" type="text" wire:model="text" :value="old('text')" autofocus required/>
    </div>
    <x-jet-button  wire:click="save" class="my-4">
        {{ __('Create comment') }}
    </x-jet-button>
    @endauth
    @guest
        <x-jet-nav-link class="comment-create" href="{{  route('login')  }}" :active="request()->routeIs('login')">
            {{ __('Create a comment') }}
        </x-jet-nav-link>
    @endguest
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    @if($comments->count() > 0)
        @foreach($comments as $comment)
            <div class="comment-wr">
             
                    <div class="comment-img">
                        <img src="/storage/{{ $comment->user()->pluck('profile_photo_path')[0] }}" alt="{{ $comment->user()->pluck('username')[0] }}">
                    </div>
                    <div class="comment-right">
                        <div class="comment-userdate">     
                            <div class="comment-user">
                                {{ $comment->user()->pluck('username')[0] }}
                            </div>
                            <small class="comment-date">
                                {{ $comment->user()->pluck('created_at')[0] }}
                            </small>
                        </div>
    
                        <div class="comment-content">
                            {{$comment->text}}
                        </div>
                        @auth
                        @if($comment->user()->pluck('id')[0] == auth()->user()->id)
                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-jet-button  class="destroy-button bg-red-500 ml-4">
                                    {{ __('Delete') }}
                                </x-jet-button>                                
                            </form>
                        @endif
                        @endauth
                    </div>
        
            </div>
        @endforeach
    @endif

</div>
