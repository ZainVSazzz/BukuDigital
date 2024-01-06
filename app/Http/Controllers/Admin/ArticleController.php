<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    private function getArticleRequestData(Request $request): array
    {
        $data = [
            'user_id' => $request->user()->id,
            'title' => $request->input('title'),
            'article-trixFields' => $request->input('article-trixFields'),
            'attachment-article-trixFields' => $request->input('attachment-article-trixFields'),
        ];

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->storePublicly('public/articles');
        }

        return $data;
    }

    public function index(Request $request): View
    {
        $query = Article::with('user');

        if ($keyword = $request->input('search')) {
            $query = $query->where('title', 'like', "%{$keyword}%");
        }

        $articles = $query->orderBy('id', 'desc')->paginate(15);

        return view('admin.article.index', compact('articles'));
    }

    public function create(): View
    {
        $article = null;
        return view('admin.article.form', compact('article'));
    }

    public function store(Request $request): RedirectResponse
    {
        Article::query()->create($this->getArticleRequestData($request));

        return redirect()
            ->route('admin.article')
            ->with('success', 'Berhasil menambah artikel berita.');
    }

    public function edit(Article $article): View
    {
        return view('admin.article.form', compact('article'));
    }

    public function update(Article $article, Request $request): RedirectResponse
    {
        $article->update($this->getArticleRequestData($request));

        return redirect()
            ->route('admin.article')
            ->with('success', 'Berhasil mengubah artikel berita.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->trixRichText->each->delete();
        $article->trixAttachments->each->purge();
        $article->delete();

        return redirect()
            ->route('admin.article')
            ->with('success', 'Berhasil menghapus artikel berita.');
    }
}
