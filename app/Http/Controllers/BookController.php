<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Book;
use App\Models\Tag;
use App\Models\Category;

class BookController extends Controller
{
    
    public function index() {
        
        
        return view('books.index');
    }

    // public function show(Article $article) {

    //     $tags = $article->tags;
    //     $categories = $article->categories;

    //     return view('articles.show', compact(
    //         'article', 'tags', 'categories'
    //      ));
        
    // }
}
