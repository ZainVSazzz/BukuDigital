<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\UserBook;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $categories = Category::query()->get()->all();

        $price = $request->input('price');

        if (!empty($price)) {
            $queryParams = $request->only('search', 'category');

            $priceExpl = explode('_', $price);

            if ($priceExpl[0] === 'lte') {
                $queryParams['max_price'] = $priceExpl[1];
            } else {
                $queryParams['min_price'] = $priceExpl[1];
            }

            return redirect()->route('book', $queryParams);
        }

        return view('book.index', compact('categories'));
    }

    public function query(Request $request): JsonResponse
    {
        $query = Book::with('category')
            ->select('category_id', 'image', 'title', 'slug', 'price', 'author');

        if ($request->has('search')) {
            $query = $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        if ($minPrice = $request->input('min_price') and !empty($minPrice)) {
            $query = $query->where('price', '>=', $minPrice);
        }

        if ($maxPrice = $request->input('max_price') and !empty($maxPrice)) {
            $query = $query->where('price', '<=', $maxPrice);
        }

        if ($categories = $request->input('categories')) {
            if (is_array($categories) && !empty($categories)) {
                $query = $query->whereIn('category_id', $categories);
            }
        }

        $data = $query->orderBy('id', 'desc')->paginate(12);

        foreach ($data->items() as $book) {
            $book['image_url'] = $book->image_url;
            $book['price_rupiah'] = rupiah($book->price);
        }

        return response()->json($data);
    }

    public function show(Book $book): View
    {
        $book->update(['views' => $book->views + 1]);
        $relatedBooks = Book::query()->where('category_id', $book->category_id)->limit(5)->get();

        $soldCount = UserBook::query()
            ->where('book_id', $book->id)
            ->count();

        return view('book.detail', compact('book', 'relatedBooks', 'soldCount'));
    }
}
