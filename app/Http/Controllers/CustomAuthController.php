<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::check()) {
            // The user is logged in, redirect them to the dashboard
            return redirect()->route('dashboard');
        }
        // The user is not logged in, show the login page
        return view('auth.login');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'min:2 | max:45',
            'email' => 'email|required|unique:users',
            'password' => 'min:6|max:20',
        ]);

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('login'))->withSuccess('Utilisateur enregistré!');
    }

    public function authentication(Request $request)
    {

        $request->validate([
            'email' => 'email|required|exists:users',
            'password' => 'min:6|max:20',
        ]);

        $credentials = $request->only('email', 'password');


        if (!Auth::validate($credentials)) :
            return redirect(route('login'))->withErrors(trans('auth.password'))->withInput();
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return redirect()->intended(route('students.index'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function dashboard()
    {
        $name = 'Guest';
        if (Auth::check()) :
            $name = Auth::user()->name;
        endif;

        return view('forum.dashboard', compact('name'));
    }
}
