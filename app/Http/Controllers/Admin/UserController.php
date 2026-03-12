<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->latest()->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function block(User $user)
    {
        if ($user->isAdmin()) {
            return back()->with('error', 'You cannot block an admin user.');
        }

        $user->update(['is_blocked' => true]);

        return back()->with('success', "{$user->name} has been blocked.");
    }

    public function unblock(User $user)
    {
        $user->update(['is_blocked' => false]);

        return back()->with('success', "{$user->name} has been unblocked.");
    }
}