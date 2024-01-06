<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()
            ->orderByDesc('id')
            ->paginate(10);

        return view('article.index', compact('articles'));
    }

    public function show(Article $article): View
    {
        return view('article.show', compact('article'));
    }
}
