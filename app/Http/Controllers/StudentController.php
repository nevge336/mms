<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        $locale = App::getLocale();

        if ($locale == 'fr') {
            foreach ($student->user->blogPosts as $blogPost) {
                $blogPost->title = $blogPost->title_fr;
                $blogPost->content = $blogPost->content_fr;
            }
            foreach ($student->user->documents as $document) {
                $document->title = $document->title_fr;
            }
        }

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
        // Update the User model
        $student->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update the Student model
        $student->update([
            'address' => $request->address,
            'phone' => $request->phone,
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
