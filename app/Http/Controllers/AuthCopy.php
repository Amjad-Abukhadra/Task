<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;


class AuthCopy extends Controller
{

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 0
        ]);


        Auth::login($user);
        return redirect()->route('login')->with('status', 'Registration success');
    }
    #register end


    #login begin


    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();


        if ($user && Hash::check($request->password, $user->password)) {

            if ($user->admin === 1) {
                return redirect()->route('admin');
            } else {

                if ($user->status === 1) {
                    Auth::login($user);
                    return redirect()->route('home')->with('status', 'welcome');
                } else {
                    return view('alert')->with('message', 'Your account is inactive.');
                }
            }
        }
        return back()->withErrors(['email' => 'Invalid credentials']);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function adminDashboard()
    {
        $users = User::all();
        return view('admin', compact('users'));
    }
    public function ShowUsers()
    {
        $users = User::all();
        $subjects = Subject::all();
        return view('admin', compact('users', 'subjects'));
    }

    public function ShowSubject()
    {
        $subject = Subject::all();
        return view('std', compact('subjects'));
    }
    public function showHome()
    {
        if (View::exists('/home')) {
            return view('/home');
        } else {
            abort(404, 'View not found');
        }
    }


    public function updateinfo(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->status = $request->status;
            $user->name = $request->username;
            $user->email = $request->email;
            $user->save();
            return redirect()->back()->with('message', 'Status updated successfully');
        }
        return redirect()->back()->with('error', 'User not found');
    }
    public function deleteRow(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->delete();
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function ShowNewSubject()
    {
        return view('std');
    }
    public function NewSubject(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'min' => 'required|integer|min:0'
        ]);
        $subject = subject::create($validated);
        return redirect()->back();
    }

    public function NewUser(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 0
        ]);

        return redirect()->back();
    }
    public function assign(Request $request)
    {
        $user = User::find($request->user_id);
        $user->subjects()->attach($request->subject_id , ['mark' => 0]) ;
        return redirect()->back();
    }

    public function changeMark(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'mark' => 'required|integer|min:0|max:100', // Ensure it's a valid integer between 0 and 100
        'user_id' => 'required|exists:users,id',   // Ensure user_id exists in users table
        'subject_id' => 'required|exists:subjects,id'  // Ensure subject_id exists in subjects table
    ]);

    // Find the user and subject using the passed IDs
    $user = User::find($request->user_id);
    $subject = Subject::find($request->subject_id);

    // Check if the user exists
    if (!$user) {
        return redirect()->back()->with('error', 'User not found.');
    }

    // Check if the subject exists
    if (!$subject) {
        return redirect()->back()->with('error', 'Subject not found.');
    }

    // Check if the user is already associated with the subject
    $existingPivot = $user->subjects()->where('subject_id', $subject->id)->first();

    if ($existingPivot) {
        // If found, update the mark in the pivot table
        $user->subjects()->updateExistingPivot($subject->id, ['mark' => $request->mark]);
    } else {
        // If not found, attach the subject with the mark
        $user->subjects()->attach($subject->id, ['mark' => $request->mark]);
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Mark updated successfully!');
}



}