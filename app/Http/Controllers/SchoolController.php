<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Models\School;
use Illuminate\Http\Request;

use function Laravel\Prompts\confirm;

class SchoolController extends Controller
{
    public function index() {
        $schools = School::all();
        return view('school.index', compact('schools'), ['title' => 'Client-Side']);
    }

    public function create() {
        return view('school.create', ['title' => 'CREATE SCHOOL']);
    }

    public function store(StoreSchoolRequest $request) {
        School::create($request->validated());

        return redirect()->route('school.index');
    }

    public function show(School $school) {
        return view('school.show', compact('school'), ['title' => 'DETAIL SCHOOL']);
    }

    public function edit(School $school) {
        return view('school.edit', compact('school'), ['title' => 'EDIT SCHOOL']);
    }

    public function update(UpdateSchoolRequest $request, School $school) {        
        $school->update($request->validated());

        return redirect()->route('school.index');
    }

    public function destroy(School $school) {
        if ($school->batchSchool()->count() > 0) {
            return redirect()->route('school.index')->with('error', 'Tidak dapat menghapus data ini karena memiliki relasi dengan data yang lain.');
        }
        
        $school->delete();

        return redirect()->route('school.index')->with('success', 'Data berhasil dihapus.');
    }
}
