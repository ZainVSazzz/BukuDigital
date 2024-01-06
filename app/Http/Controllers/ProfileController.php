<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($password = $request->input('password') and !empty($password)) {
            $data['password'] = bcrypt($password);
        } else {
            unset($data['password']);
        }

        $request->user()->fill($data);
        $request->user()->save();

        return Redirect::route('profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
