<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\BatchSchoolMajor;
use App\Models\Student;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        abort_unless(auth()->user()->can('view-all-student'), 403);

        $students = Student::all();
        return view('student.index', compact('students'), ['title' => 'CRUD STUDENT']);
    }

    public function create(Student $student) {
        abort_unless(auth()->user()->can('create-student'), 403);
        
        return view('student.create', compact('student'), ['title' => 'CREATE STUDENT']);
    }

    public function store(StoreStudentRequest $request, Student $student) {
        $randomBatchSchoolMajorId = BatchSchoolMajor::inRandomOrder()->first()->id;
        $randomUserId = User::inRandomOrder()->first()->id;

        $student->create([
            'name' => $request['name'],
            'phone_number' => $request['phone_number'],
            'batch_school_major_id' => $randomBatchSchoolMajorId,
            'user_id' => $randomUserId,
        ]);

        return redirect()->route('student.index');
    }

    public function show(Student $student) {
        abort_unless(auth()->user()->can('view-all-student'), 403);

        return view('student.show', compact('student'), ['title' => 'DETAIL STUDENT']);
    }

    public function edit(Student $student) {
        abort_unless(auth()->user()->can('edit-student'), 403);

        return view('student.edit', compact('student'), ['title' => 'EDIT STUDENT']);
    }

    public function update(UpdateStudentRequest $request, Student $student) {
        $student->update($request->validated());

        return redirect()->route('student.index');
    }

    public function destroy(Student $student) {
        abort_unless(auth()->user()->can('delete-student'), 403);

        if ($student->batchSchoolMajor()->count() > 0) {
            return redirect()->route('student.index')->with('error', 'Tidak dapat menghapus data ini karena memiliki relasi dengan data yang lain.');
        }

        if ($student->user()->count() > 0) {
            return redirect()->route('student.index')->with('error', 'Tidak dapat menghapus data ini karena memiliki relasi dengan data yang lain.');
        }

        $student->delete();

        return redirect()->route('student.index')->with('success', 'Data berhasil dihapus.');
    }

    public function getData(Request $request) {
        if (!$request->ajax()){
            return response()->json(['error' => 'Invalid request'], 400);
        }
        
        $students = Student::query();
    
        return DataTables::of($students)
            ->addColumn('action', function ($student) {
                return view('student.partials.actions', compact('student'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
