<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController
{
    public function index()
    {
        $users = User::factory(50)->make();

        return view('dashboard', compact('users'));
    }
}
