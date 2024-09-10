<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\BatchSchoolMajor;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function index() {
        $batches = Batch::paginate(5);
        return view('batch.index', compact('batches'), ['title' => 'CRUD BATCH']);
    }

    public function create() {
        return view('batch.create', ['title' => 'CREATE BATCH']);
    }

    public function store(Request $request) {
        Batch::create($request->validate([
            'year' => ['required', 'digits:4', 'integer']
        ]));

        return redirect()->route('batch.index');
    }

    public function show($id) {
        $batch = Batch::findOrFail($id);
        return view('batch.show', compact('batch'), ['title' => 'DETAIL BATCH']);
    }

    public function edit($id) {
        $batch = Batch::findOrFail($id);
        return view('batch.edit', compact('batch'), ['title' => 'EDIT BATCH']);
    }

    public function update(Request $request, $id) {
        Batch::findOrFail($id)->update($request->validate([
            'year' => ['required', 'digits:4', 'integer']
        ]));

        return redirect()->route('batch.index');
    }

    public function destroy($id) {
        $batch = Batch::findOrFail($id);
        $batch->delete();

        return redirect()->route('batch.index');
    }
}
