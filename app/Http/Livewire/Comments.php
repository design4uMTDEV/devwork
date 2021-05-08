<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Article;
use App\Models\Comment;

class Comments extends Component
{

    public $article, $text;

    public function render()
    {
        $article = $this->article;
        $comments = $article->comments()->latest()->paginate(15);
        return view('livewire.comments', compact('comments'));
    }

    protected function validateComment() {
        // Comment validation 

        $this->validate([
        
            'text' => ['required', 'string'],
         
        ]);
    }

    public function save() {

        $this->validateComment();
        
        // New instance of an article
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->article_id = $this->article->id;
        $comment->text = $this->text;
      
        $comment->save();
        
        // Flash feedback messages
        session()->flash('message', 'Comment created.');
    
    }

}
