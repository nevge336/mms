<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use App\Models\Student;
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
            return redirect()->route(('students.index'));
        }
        // The user is not logged in, show the login page
        return view('auth.login');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all(); // Fetch all cities from your database. Replace 'City' with your actual model name.

        return view('auth.create', compact('cities')); // Pass the $cities variable to the view.
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'min:2|max:45',
            'email' => 'email|required|unique:users',
            'password' => 'min:6|max:20',
            'address' => 'required|max:150',
            'phone' => 'required|max:20',
            'birthday' => 'required|date',
            'city_id' => 'required|exists:cities,id'
        ]);

        $user = new User;
        $user->fill($request->only('name', 'email'));
        $user->password = Hash::make($request->password);
        $user->save();

        $studentData = $request->only('address', 'phone', 'birthday', 'city_id');
        $studentData['user_id'] = $user->id; // Assuming there's a user_id field in the students table

        $newStudent = Student::create($studentData);

        return redirect(route('login'))->withSuccess('Utilisateur et profil étudiant enregistrés!');
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

        return view('dashboard', compact('name'));
    }
}
