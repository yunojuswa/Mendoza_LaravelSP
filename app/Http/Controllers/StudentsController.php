<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::orderByDesc('created_at')->paginate(5);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }
    public function store(Request $request)
    {
        //validate data
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'course' => 'required|string|max:255',
            'yearlevel' => 'required|integer|min:1|max:4',
        ]);

        //dd('ok');

        //create student
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    public function show(Student $student)
    {
        //find student by Id
        // $student = Student::findOrFail($id);
        // dd($student);
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        //validate data
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'course' => 'required|string|max:255',
            'yearlevel' => [
                'required',
                'integer',
                'min:1',
                'max:4'
            ],

        ]);

        //dd('ok');

        //update student
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully!'); 
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }

}
