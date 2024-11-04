<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use App\Models\Batch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function index() {
        abort_unless(auth()->user()->can('view-all-batch'), 403);

        $batches = Batch::paginate(5);
        return view('batch.index', compact('batches'), ['title' => 'CRUD BATCH']);
    }

    public function create() {
        abort_unless(auth()->user()->can('create-batch'), 403);
        
        return view('batch.create', ['title' => 'CREATE BATCH']);
    }

    public function store(StoreBatchRequest $request) {
        Batch::create($request->validated());

        return redirect()->route('batch.index');
    }

    public function show(Batch $batch) {
        abort_unless(auth()->user()->can('view-all-batch'), 403);

        return view('batch.show', compact('batch'), ['title' => 'DETAIL BATCH']);
    }

    public function edit(Batch $batch) {
        abort_unless(auth()->user()->can('edit-batch'), 403);

        return view('batch.edit', compact('batch'), ['title' => 'EDIT BATCH']);
    }

    public function update(UpdateBatchRequest $request, Batch $batch) {
        $batch->update($request->validated());

        return redirect()->route('batch.index');
    }

    public function destroy(Batch $batch) {
        abort_unless(auth()->user()->can('delete-batch'), 403);

        if ($batch->batchSchool()->count() > 0) {
            return redirect()->route('batch.index')->with('error', 'Tidak dapat menghapus data ini karena memiliki relasi dengan data yang lain.');
        }
        
        $batch->delete();

        return redirect()->route('batch.index')->with('success', 'Data berhasil dihapus.');
    }
}
