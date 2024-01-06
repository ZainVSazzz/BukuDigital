<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MyBookController extends Controller
{
    public function index(Request $request): View
    {
        $query = UserBook::with('book');

        if ($search = $request->input('search') and !empty($search)) {
            $query = $query->whereHas('book', function (Builder $q) use ($search) {
                return $q->where('title', 'like', "%{$search}%");
            });
        }

        $myBooks = $query
            ->where('user_id', $request->user()->id)
            ->paginate(15);

        return view('my-book.index', compact('myBooks'));
    }

    public function file($id, $randomStr): BinaryFileResponse
    {
        $myBook = UserBook::with('book')
            ->where('user_id', request()->user()->id)
            ->where('id', $id)
            ->firstOrFail();

        return response()->file(Storage::path($myBook->book->file_path), [
            'Content-Disposition' => 'inline; filename="' . $myBook->book->title . '.pdf"',
        ]);

//        return Storage::download($myBook->book->file_path);
    }

    public function view($id): View
    {
        $myBook = UserBook::with('book')
            ->where('user_id', request()->user()->id)
            ->where('id', $id)
            ->firstOrFail();

        return view('my-book.view', compact('myBook'));
    }
}
