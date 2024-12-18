<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMentorRequest;
use App\Http\Requests\UpdateMentorRequest;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MentorController extends Controller
{
    public function index() {
        abort_unless(auth()->user()->can('view-all-mentor'), 403);

        return view('mentor.index', ['title' => 'CRUD PEMBIMBING SEKOLAH']);
    }

    public function create() {
        abort_unless(auth()->user()->can('create-mentor'), 403);

        return view('mentor.create', ['title' => 'CREATE PEMBIMBING SEKOLAH']);
    }

    public function store(StoreMentorRequest $request) {
        Mentor::create($request->validated());

        return redirect()->route('mentor.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(Mentor $mentor) {
        abort_unless(auth()->user()->can('view-all-mentor'), 403);

        $mentor->load('student');

        return view('mentor.show', compact('mentor'), ['title' => 'DETAIL PEMBIMBING SEKOLAH']);
    }

    public function edit(Mentor $mentor) {
        abort_unless(auth()->user()->can('edit-mentor'), 403);

        return view('mentor.edit', compact('mentor'), ['title' => 'EDIT PEMBIMBING SEKOLAH']);
    }

    public function update(UpdateMentorRequest $request, Mentor $mentor) {
        $mentor->update($request->validated());

        return redirect()->route('mentor.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Mentor $mentor) {
        abort_unless(auth()->user()->can('delete-mentor'), 403);

        if ($mentor->student()->count() > 0) {
            return redirect()->route('mentor.index')->with('error', 'Tidak dapat menghapus data ini karena memiliki relasi dengan data yang lain.');
        }

        $mentor->delete();

        return redirect()->route('mentor.index')->with('success', 'Data berhasil dihapus.');
    }

    public function getData(Request $request) {
        if (!$request->ajax()){
            return response()->json(['error' => 'Invalid request'], 400);
        }
        
        $mentors = Mentor::query();
    
        return DataTables::of($mentors)
            ->addColumn('action', function ($mentor) {
                return view('mentor.partials.actions', compact('mentor'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
