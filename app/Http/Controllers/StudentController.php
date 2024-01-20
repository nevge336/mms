<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = $request->get('search');

        if ($search) {
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->where('users.name', 'LIKE', '%' . $search . '%')
                ->select('students.*') // Avoid getting non-student fields due to join
                ->orderBy('users.name')
                ->paginate(15);
        } else {
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->select('students.*') // Avoid getting non-student fields due to join
                ->orderBy('users.name')
                ->paginate(15);
        }

        return view('students.index', compact('students'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('students.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|max:150',
            'phone' => 'required|max:20',
            'birthday' => 'required|date',
            'city_id' => 'required|exists:cities,id'
        ]);

        $newStudent = Student::create($validatedData);

        return redirect()->route('students.index')->withSuccess('Profil étudiant créé avec succès!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $cities = City::all();
        return view('students.edit', compact('student', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'city_id' => $request->city_id
        ]);

        return redirect(route('students.show', $student->id))->withSuccess('Profil étudiant modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect(route('students.index'))->withSuccess('Profil étudiant supprimé avec succès!');
    }
}
