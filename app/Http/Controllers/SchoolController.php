<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use function Laravel\Prompts\confirm;

class SchoolController extends Controller
{
    public function index() {
        abort_unless(auth()->user()->can('view-all-school'), 403);

        $schools = School::all();
        return view('school.index', compact('schools'), ['title' => 'Client-Side']);
    }

    public function create() {
        abort_unless(auth()->user()->can('create-school'), 403);

        return view('school.create', ['title' => 'CREATE SCHOOL']);
    }

    public function store(StoreSchoolRequest $request) {
        School::create($request->validated());

        return redirect()->route('school.index');
    }

    public function show(School $school) {
        abort_unless(auth()->user()->can('view-all-school'), 403);
        
        return view('school.show', compact('school'), ['title' => 'DETAIL SCHOOL']);
    }

    public function edit(School $school) {
        abort_unless(auth()->user()->can('edit-school'), 403);

        return view('school.edit', compact('school'), ['title' => 'EDIT SCHOOL']);
    }

    public function update(UpdateSchoolRequest $request, School $school) {        
        $school->update($request->validated());

        return redirect()->route('school.index');
    }

    public function destroy(School $school) {
        abort_unless(auth()->user()->can('delete-batch'), 403);

        if ($school->batchSchool()->count() > 0) {
            return redirect()->route('school.index')->with('error', 'Tidak dapat menghapus data ini karena memiliki relasi dengan data yang lain.');
        }
        
        $school->delete();

        return redirect()->route('school.index')->with('success', 'Data berhasil dihapus.');
    }
}
