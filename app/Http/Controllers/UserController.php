<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function checkStatus($id)
    {
        // Retrieve the user by ID
        $user = User::find($id);

        // Check if user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Check the user's status
        if ($user->status === 1) {
            return view('home', ['user' => $user]);
        } elseif ($user->status === 0) {
            return view('alert', ['user' => $user]);
        }
        else {
            return view('login', ['user' => $user]);
        }
    }
}
