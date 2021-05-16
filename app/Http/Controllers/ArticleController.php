<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;

class ArticleController extends Controller
{
    
    public function index() {
        $articles = Article::latest()->paginate(9);
        
        return view('articles.index', compact(
            'articles'
         ));
    }

    

    public function show(Article $article) {

        $tags = $article->tags;
        $categories = $article->categories;

        return view('articles.show', compact(
            'article', 'tags', 'categories'
         ));
        
    }
    public function edit(Article $article) {
        
        $tags = $article->tags;
        
        $categories = $article->categories;

        return view('articles.show', compact(
            'article', 'tags', 'categories'
        ));
    }

    public function create() {
        
        $tags = Tag::all();
        
        $categories = Category::all();

   
        return view('articles.create', compact(
            'tags', 'categories'
        ));
    }

    public function update(Article $article) {

        $data = request()->validate([
         
            'title' => ['string', 'max:60'],
            'excerpt' => '',
            'body' => ['string'],
            
        ]);


        $article->update($data);

        // Flash feedback messages
        session()->flash('message', 'Article updated.');
        
        return redirect(route('article.show', $article));
    }



    public function destroy(Article $article) {
        
        $article->delete();

        return redirect('/blog');
    }
}
