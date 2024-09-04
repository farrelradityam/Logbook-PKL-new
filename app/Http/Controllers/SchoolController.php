<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    function tampil() {
        $schools = School::all();
        return view('school.tampil', compact('schools'), ['title' => 'CRUD SEKOLAH']);
    }

    function tambah() {
        return view('school.tambah', ['title' => 'TAMBAH SEKOLAH']);
    }

    function submit(Request $request) {
        $school = new School();
        $school->name = $request->name;
        $school->address = $request->address;
        $school->save();

        return redirect()->route('school.tampil');
    }

    function edit($id) {
        $school = School::find($id);
        return view('school.edit', compact('school'), ['title' => 'EDIT SEKOLAH']);
    }

    function update(Request $request, $id) {
        $school = School::find($id);
        $school->name = $request->name;
        $school->address = $request->address;
        $school->update();

        return redirect()->route('school.tampil');
    }

    function delete($id) {
        $school = School::find($id);
        $school->delete();

        return redirect()->route('school.tampil');
    }
}
