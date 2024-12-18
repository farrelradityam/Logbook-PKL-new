<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\BatchSchoolMajor;
use App\Models\IndustryAdvisor;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        abort_unless(auth()->user()->can('view-all-student'), 403);

        $students = Student::all();
        return view('student.index', compact('students'), ['title' => 'CRUD SISWA']);
    }

    public function create(Student $student) {
        abort_unless(auth()->user()->can('create-student'), 403);

        $batchSchoolMajors = BatchSchoolMajor::all();
        $mentors = Mentor::all();
        $industryAdvisors = IndustryAdvisor::all();
        
        return view('student.create', compact('student', 'batchSchoolMajors', 'mentors', 'industryAdvisors'), ['title' => 'CREATE SISWA']);
    }

    public function store(StoreStudentRequest $request, Student $student) {
        Student::create($request->validated());

        return redirect()->route('student.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(Student $student) {
        abort_unless(auth()->user()->can('view-all-student'), 403);

        $student->load('batchSchoolMajor.batchSchool.school', 'batchSchoolMajor.batchSchool.batch', 'batchSchoolMajor.major');

        return view('student.show', compact('student'), ['title' => 'DETAIL SISWA']);
    }

    public function edit(Student $student) {
        abort_unless(auth()->user()->can('edit-student'), 403);

        $batchSchoolMajors = BatchSchoolMajor::all();
        $mentors = Mentor::all();
        $industryAdvisors = IndustryAdvisor::all();

        return view('student.edit', compact('student', 'batchSchoolMajors', 'mentors', 'industryAdvisors'), ['title' => 'EDIT SISWA']);
    }

    public function update(UpdateStudentRequest $request, Student $student) {
        $student->update($request->validated());

        return redirect()->route('student.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function destroy(Student $student) {
        abort_unless(auth()->user()->can('delete-student'), 403);

        if ($student->batchSchoolMajor()->count() > 0) {
            return redirect()->route('student.index')->with('error', 'Tidak dapat menghapus data ini karena memiliki relasi dengan data yang lain.');
        }

        if ($student->mentor()->count() > 0) {
            return redirect()->route('student.index')->with('error', 'Tidak dapat menghapus data ini karena memiliki relasi dengan data yang lain.');
        }

        if ($student->industryAdvisor()->count() > 0) {
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
