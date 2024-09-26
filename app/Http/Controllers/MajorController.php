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
        return view('major.index', ['title' => 'Server-Side']);
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

    public function getData() {
        return DataTables::of(Major::query())
        ->addColumn('action', function ($major) {
            return '
                <div class="flex justify-center space-x-2 mb-3 mt-3">
                    <a href="'.route('major.show', $major->id).'" class="px-4 py-2  bg-sky-500 hover:bg-sky-700 text-white rounded-md">Detail</a>
                    <a href="'.route('major.edit', $major->id).'" class="px-4 py-2  bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
                    <form action="'.route('major.destroy', $major->id).'" method="post" onsubmit="return confirmDelete(event)">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</button>
                    </form>
                </div>
            ';
        })
        ->make(true);
    }
}