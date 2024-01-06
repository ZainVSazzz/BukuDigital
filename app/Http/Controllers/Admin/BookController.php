<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BookController extends Controller
{
    private function getBookRequestData(Request $request): array
    {
        $data = [
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'description' => $request->input('description'),
            'author' => $request->input('author'),
            'price' => $request->input('price'),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->storePublicly('public/books-image');
        }

        if ($request->hasFile('book_file')) {
            $data['file_path'] = $request->file('book_file')->store('book-file');
        }

        return $data;
    }

    public function index(Request $request): View
    {
        $query = Book::with('category');

        if ($keyword = $request->input('search')) {
            $query = $query->where('title', 'like', "%{$keyword}%");
        }

        $books = $query->orderBy('id', 'desc')->paginate(15);

        return view('admin.book.index', compact('books'));
    }

    public function create(): View
    {
        $book = null;
        $categories = Category::query()->get()->all();

        return view('admin.book.form', compact('book', 'categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        Book::query()->create($this->getBookRequestData($request));

        return redirect()
            ->route('admin.book')
            ->with(['success' => 'Berhasil menambahkan data buku.']);
    }

    public function file(Book $book, string $randomStr): BinaryFileResponse
    {
        return response()->file(Storage::path($book->file_path), [
            'Content-Disposition' => 'inline; filename="' . $book->title . '.pdf"',
        ]);
    }

    public function edit(Book $book): View
    {
        $categories = Category::query()->get()->all();

        return view('admin.book.form', compact('book', 'categories'));
    }

    public function update(Book $book, Request $request): RedirectResponse
    {
        $book->update($this->getBookRequestData($request));

        return redirect()
            ->route('admin.book')
            ->with(['success' => 'Berhasil mengubah data buku.']);
    }

    public function destroy(Book $book): RedirectResponse
    {
        Storage::delete($book->image);
        Storage::delete($book->file_path);

        $book->delete();

        return redirect()
            ->route('admin.book')
            ->with(['success' => 'Berhasil menghapus data buku.']);
    }
}
