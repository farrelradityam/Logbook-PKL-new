<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use App\Models\Major;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use function Laravel\Prompts\confirm;

class MajorController extends Controller
{
    public function index() {
        abort_unless(auth()->user()->can('view-all-major'), 403);

        return view('major.index', ['title' => 'Server-Side']);
    }

    public function create() {
        abort_unless(auth()->user()->can('create-major'), 403);

        return view('major.create', ['title' => 'CREATE MAJOR']);
    }

    public function store(StoreMajorRequest $request) {
        Major::create($request->validated());

        return redirect()->route('major.index');
    }

    public function show(Major $major) {
        abort_unless(auth()->user()->can('view-all-major'), 403);

        return view('major.show', compact('major'), ['title' => 'DETAIL MAJOR']);
    }

    public function edit(Major $major) {
        abort_unless(auth()->user()->can('edit-major'), 403);

        return view('major.edit', compact('major'), ['title' => 'EDIT MAJOR']);
    }

    public function update(UpdateMajorRequest $request, Major $major) {
        $major->update($request->validated());

        return redirect()->route('major.index');
    }

    public function destroy(Major $major) {
        abort_unless(auth()->user()->can('delete-major'), 403);

        if ($major->batchSchoolMajor()->count() > 0) {
            return redirect()->route('major.index')->with('error', 'Tidak dapat menghapus data ini karena memiliki relasi dengan data yang lain.');
        }

        $major->delete();

        return redirect()->route('major.index')->with('success', 'Data berhasil dihapus.');
    }

    public function getData(Request $request) {
        if (!$request->ajax()){
            return response()->json(['error' => 'Invalid request'], 400);
        }
        
        $majors = Major::query();
    
        return DataTables::of($majors)
            ->addColumn('action', function ($major) {
                return view('major.partials.actions', compact('major'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}