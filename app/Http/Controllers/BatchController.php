<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    function tampil() {
        $batches = Batch::all();
        return view('batch.tampil', compact('batches'), ['title' => 'CRUD ANGKATAN']);
    }

    function tambah() {
        return view('batch.tambah', ['title' => 'TAMBAH ANGKATAN']);
    }

    function submit(Request $request) {
        $batch = new Batch();
        $batch->year = $request->year;
        $batch->save();

        return redirect()->route('batch.tampil');
    }

    function edit($id) {
        $batch = Batch::find($id);
        return view('batch.edit', compact('batch'), ['title' => 'EDIT ANGKATAN']);
    }

    function update(Request $request, $id) {
        $batch = Batch::find($id);
        $batch->year = $request->year;
        $batch->update();

        return redirect()->route('batch.tampil');
    }

    function delete($id) {
        $batch = Batch::find($id);
        $batch->delete();

        return redirect()->route('batch.tampil');
    }
}
