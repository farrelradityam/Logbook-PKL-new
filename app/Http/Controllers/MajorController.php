<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index() {
        $majors = Major::paginate(5);
        return view('major.index', compact('majors'), ['title' => 'CRUD MAJOR']);
    }

    public function create() {
        return view('major.create', ['title' => 'CREATE MAJOR']);
    }

    public function store(StoreMajorRequest $request) {
        Major::create($request->validated());

        return redirect()->route('major.index');
    }

    public function show(Major $major) {
        return view('major.show', compact('major'), ['title' => 'DETAIL MAJOR']);
    }

    public function edit(Major $major) {
        return view('major.edit', compact('major'), ['title' => 'EDIT MAJOR']);
    }

    public function update(UpdateMajorRequest $request, Major $major) {
        $major->update($request->validated());

        return redirect()->route('major.index');
    }

    public function destroy(Major $major) {
        $major->delete();

        return redirect()->route('major.index');
    }
}