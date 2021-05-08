<div>
    <x-jet-validation-errors class="mb-4" />    

    @if ($image)
        Photo Preview:
        <img width="150px" src="{{ $image->temporaryUrl() }}">
    @elseif($article != null)
        <img src="/storage/{{ $article->image }}" style="width:150px;" alt=" {{$article->title}}" srcset="">
    @endif
    <input class="custom-file-input" type="file" wire:model="image">
    <br/>

        <div class="mt-4">
            <x-jet-label for="title" value="Title" />
            <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')" autofocus required/>
        </div>
        
        <div class="mt-4">
            <x-jet-label for="excerpt" value="Excerpt" />
            <x-jet-input id="excerpt" class="block mt-1 w-full" type="text" wire:model="excerpt" :value="old('excerpt')" required/>
        </div>
        
        <div>
            <x-jet-label for="body" value="Body" />                
            <textarea  id="body" class="block mt-1 w-full" type="text" wire:model="body" :value="old('body')" required rows="4" cols="50"></textarea>
        </div>

        <div class="mt-4">
            <x-jet-label  for="category_id" value="Category"/>
            <select wire:model="category_id" id="category_id">
                <option value="">Select Category:</option>
                @foreach($categories as $category)
                    <option value='{{ $category->id }}'>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mt-4">
            <x-jet-label for="tag_id" value="Tags" />
            
            <select wire:model="tag_id" multiple id="tag_id">
                @foreach($tags as $tag)
                    <option value='{{ $tag->id }}'>{{ $tag->title }}</option>
                @endforeach
            </select>
        
        </div>

        <x-jet-button  wire:click="save" class="ml-4">
            {{ __('Create') }}
        </x-jet-button>
        <div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

</div>
