<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userAttributes = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $employerAttributes = $request->validate([
            'employer' => 'required',
            'logo' => ['required', File::types(['png', 'jpg', 'webp'])]
        ]);

        $file = $request->file('logo');
        
        if (!$file->isValid()) {
            return back()->withErrors(['logo' => 'Invalid file.']);
        }

        $logoPath = $file->store('logos', 'public');
        
        if (!$logoPath || !Storage::disk('public')->exists($logoPath)) {
            return back()->withErrors(['logo' => 'Failed to upload logo. Please check directory permissions.']);
        }

        $user = User::create($userAttributes);
        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => 'storage/' . $logoPath,
        ]);

        event(new UserRegistered($user));
        Auth::login($user);

        return redirect()->route('verification.notice');
    }
}
