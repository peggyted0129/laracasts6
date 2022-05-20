<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticlesController extends Controller
{
    public function index()
    {
        if( request('tag') ){
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
            // return $articles;
        } else {
            $articles = Article::latest()->get();
            // return $articles;
        }
       
        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article) 
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store(Request $request)
    {
        // dd( request()->all() );
        $this->validateArticle();
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;  // auth()->id()
        $article->save();

        $article->tags()->attach( request('tags') ); // [1, 2, 3]

        return redirect( route('articles.index') );
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id',
        ]);
    }

    public function destroy(Article $article)
    {
        // dd( $article );
        $article->delete();
        return redirect()->route('articles.index');
    
    }
}
