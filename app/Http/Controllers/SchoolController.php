<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index() {
        $schools = School::paginate(5);
        return view('school.index', compact('schools'), ['title' => 'CRUD SCHOOL']);
    }

    public function create() {
        return view('school.create', ['title' => 'CREATE SCHOOL']);
    }

    public function store(Request $request) {
        School::create($request->validate([
            'name' => ['required', 'min:3', 'max:255', 'string'],
            'address' => ['required', 'min:3', 'max:255', 'string'],
        ]));

        return redirect()->route('school.index');
    }

    public function show($id) {
        $school = School::findOrFail($id);
        return view('school.show', compact('school'), ['title' => 'DETAIL SCHOOL']);
    }

    public function edit($id) {
        $school = School::findOrFail($id);
        return view('school.edit', compact('school'), ['title' => 'EDIT SCHOOL']);
    }

    public function update(Request $request, $id) {
        School::findOrFail($id)->update($request->validate([
            'name' => ['required', 'min:3', 'max:255', 'string'],
            'address' => ['required', 'min:3', 'max:255', 'string'],
        ]));

        return redirect()->route('school.index');
    }

    public function destroy($id) {
        $school = School::findOrFail($id);
        $school->delete();

        return redirect()->route('school.index');
    }
}
