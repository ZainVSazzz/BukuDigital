<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        if ($keyword = $request->input('search')) {
            $users = User::query()
                ->where('name', 'like', "%{$keyword}%")
                ->orWhere('email', 'like', "%{$keyword}%")
                ->orWhere('phone', 'like', "%{$keyword}%")
                ->paginate(15);
        } else {
            $users = User::paginate(15);
        }

        return view('admin.user.index', compact('users'));
    }
}
