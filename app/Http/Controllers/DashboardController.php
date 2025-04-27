<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $users = User::with('address')->get();
        return view('dashboard', compact('users'));
    }
}