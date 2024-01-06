<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        $latestBooks = Book::query()
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return view('home', compact('categories', 'latestBooks'));
    }
}
