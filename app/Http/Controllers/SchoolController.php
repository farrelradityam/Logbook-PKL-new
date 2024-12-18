<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Models\Batch;
use App\Models\BatchSchool;
use App\Models\BatchSchoolMajor;
use App\Models\Major;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use function Laravel\Prompts\confirm;

class SchoolController extends Controller
{
    public function index() {
        abort_unless(auth()->user()->can('view-all-school'), 403);

        $schools = School::all();
        return view('school.index', compact('schools'), ['title' => 'CRUD SEKOLAH']);
    }

    public function create() {
        abort_unless(auth()->user()->can('create-school'), 403);

        $batches = Batch::all();
        $majors = Major::all();

        return view('school.create', compact('batches','majors'), ['title' => 'CREATE SEKOLAH']);
    }

    public function store(StoreSchoolRequest $request) {
        $school = School::create($request->validated());
    
        if ($request->has('batch')) {
            foreach ($request->batch as $batchId) {
                $batchSchool = BatchSchool::create([
                    'school_id' => $school->id,
                    'batch_id' => $batchId,
                ]);
    
                if ($request->has('major')) {
                    foreach ($request->major as $majorId) {
                        $batchSchool->major()->attach($majorId);
                    }
                }
            }
        }
    
        return redirect()->route('school.index')->with('success', 'Data berhasil ditambahkan.');
    }
    

    public function show(School $school) {
        abort_unless(auth()->user()->can('view-all-school'), 403);

        $school->load(['batch', 'batchSchool.major']);
        
        return view('school.show', compact('school'), ['title' => 'DETAIL SEKOLAH']);
    }

    public function edit(School $school) {
        abort_unless(auth()->user()->can('edit-school'), 403);

        $batches = Batch::all();
        $majors = Major::all();

        $school->load(['batch', 'batchSchool.major']);

        return view('school.edit', compact('school', 'batches', 'majors'), ['title' => 'EDIT SEKOLAH']);
    }

    public function update(UpdateSchoolRequest $request, School $school) {
        $school->update($request->validated());
    
        if ($request->has('batch')) {
            foreach ($request->batch as $batchId) {
                $batchSchool = BatchSchool::firstOrCreate([
                    'school_id' => $school->id,
                    'batch_id' => $batchId,
                ]);
    
                if ($request->has('major')) {
                    foreach ($request->major as $majorId) {
                        $batchSchool->major()->syncWithoutDetaching([$majorId]);
                    }
                }
            }
        }
    
        return redirect()->route('school.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(School $school) {
        abort_unless(auth()->user()->can('delete-batch'), 403);

        if ($school->batchSchool()->count() > 0) {
            return redirect()->route('school.index')->with('error', 'Tidak dapat menghapus data ini karena memiliki relasi dengan data yang lain.');
        }
        
        $school->delete();

        return redirect()->route('school.index')->with('success', 'Data berhasil dihapus.');
    }

    public function getData(Request $request) {
        if (!$request->ajax()){
            return response()->json(['error' => 'Invalid request'], 400);
        }
        
        $schools = School::query();
    
        return DataTables::of($schools)
            ->addColumn('action', function ($school) {
                return view('school.partials.actions', compact('school'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
