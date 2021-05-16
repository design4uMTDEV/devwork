<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;

class SearchArticles extends Component
{     
    public $search;

    public function render()
    {

        $articles = Article::where('title', 'LIKE', '%'.$this->search.'%')->paginate(4);
        return view('livewire.search-articles', compact('articles'));
    }
}
