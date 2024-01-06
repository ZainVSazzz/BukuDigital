<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use App\Models\UserBook;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): View
    {
        if (Auth::user()->is_admin) {
            return $this->admin();
        }

        return $this->user();
    }

    public function user(): View
    {
        $bookCount = UserBook::query()
            ->where('user_id', request()->user()->id)
            ->count();

        return view('dashboard', compact('bookCount'));
    }

    public function admin(): View
    {
        $usersCount = User::all('id')->count();
        $booksCount = Book::all('id')->count();
        $articlesCount = Article::all('id')->count();
        $ordersCount = Order::all('id')->count();

        return view('admin.dashboard', compact('usersCount', 'booksCount', 'articlesCount', 'ordersCount'));
    }
}
