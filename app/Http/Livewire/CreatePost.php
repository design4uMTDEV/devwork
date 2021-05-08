<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;

use Livewire\Component;

class CreatePost extends Component
{

    use WithFileUploads;

   

    public $image, $article, $title, $excerpt, $body, $category_id, $tag_id;

    public function render()
    {

        $tags = Tag::all();
        
        $categories = Category::all();

        return view('livewire.create-post', compact(
            'tags', 'categories'
        ));
    }

    protected function validateArticle() {
        // Article validation 

        $this->validate([
        
            'category_id' => '',
            'tag_id' => '',
            'title' => ['required', 'string', 'max:60'],
            'excerpt' => '',
            'body' => ['required', 'string'],
            'image' => 'image|max:4096', 
        ]);
    }

    public function save() {

        $this->validateArticle();
        
        // Upload image to the post_images directory
        $image_path = $this->image->store('post_images', 'public');
        
        // New instance of an article
        $article = new Article();
        $article->user_id = auth()->user()->id;
        $article->title = $this->title;
        $article->excerpt = $this->excerpt;
        $article->body= $this->body;
        $article->image = $image_path;
        $article->category_id = $this->category_id;
      
        $article->save();
       
        // Attach an array of tags to the articles tags pivot table
        $article->tags()->attach($this->tag_id);
        
        // Flash feedback messages
        session()->flash('message', 'Article created.');
        
	    return redirect(route('home'));
    }
}
