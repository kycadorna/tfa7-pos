<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
        ]);

        $validated['name'] = $validated['full_name'];
        $validated['password'] = Hash::make('password');

        User::create($validated);

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        $validated['name'] = $validated['full_name'];

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $manager = new ImageManager(new Driver());

            $image = $manager
                ->read($request->file('avatar'))
                ->scaleDown(width: 300, height: 300)
                ->toJpeg(quality: 80);

            $path = 'avatars/' . Str::uuid() . '.jpg';

            Storage::disk('public')->put($path, (string) $image);

            $validated['avatar'] = $path;
        }

        $user->update($validated);

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully.');
    }
}