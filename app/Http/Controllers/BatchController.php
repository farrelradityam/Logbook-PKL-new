<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use App\Models\Batch;
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

    public function store(StoreBatchRequest $request) {
        Batch::create($request->validated());

        return redirect()->route('batch.index');
    }

    public function show(Batch $batch) {
        return view('batch.show', compact('batch'), ['title' => 'DETAIL BATCH']);
    }

    public function edit(Batch $batch) {
        return view('batch.edit', compact('batch'), ['title' => 'EDIT BATCH']);
    }

    public function update(UpdateBatchRequest $request, Batch $batch) {
        $batch->update($request->validated());

        return redirect()->route('batch.index');
    }

    public function destroy(Batch $batch) {
        if ($batch->batchSchool()->count() > 0) {
            return redirect()->route('batch.index')->with('error', 'Tidak dapat menghapus data ini karena memiliki relasi dengan data yang lain.');
        }
        
        $batch->delete();

        return redirect()->route('batch.index')->with('success', 'Data berhasil dihapus.');
    }
}
