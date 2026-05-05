<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $bookings = $user->bookings()->with('hotel')->get();
        $likes = $user->likes()->with('hotel.images')->get();
        
        return view('profile', compact('user', 'bookings', 'likes'));
    }
    

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Имя успешно обновлено',
            'name' => $user->name
        ]);
    }

    public function editProfile()
    {
        return view('profile-edit', ['user' => Auth::user()]);
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
