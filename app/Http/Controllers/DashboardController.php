<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->isAdmin()) {
            $stats = [
                'total_users'    => User::where('is_admin', false)->count(),
                'blocked_users'  => User::where('is_blocked', true)->count(),
                'total_products' => Product::count(),
            ];
        } else {
            $stats = [
                'total_products' => $user->products()->count(),
            ];
        }

        return view('dashboard', compact('stats'));
    }
}