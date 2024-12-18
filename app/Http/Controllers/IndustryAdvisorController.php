<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIndustryAdvisorRequest;
use App\Http\Requests\UpdateIndustryAdvisorRequest;
use App\Models\IndustryAdvisor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class IndustryAdvisorController extends Controller
{
    public function index() {
        abort_unless(auth()->user()->can('view-all-industryAdvisor'), 403);

        return view('industry_advisor.index', ['title' => 'CRUD PEMBIMBING LAPANGAN']);
    }

    public function create() {
        abort_unless(auth()->user()->can('create-industryAdvisor'), 403);

        return view('industry_advisor.create', ['title' => 'CREATE PEMBIMBING LAPANGAN']);
    }

    public function store(StoreIndustryAdvisorRequest $request) {
        IndustryAdvisor::create($request->validated());

        return redirect()->route('industryAdvisor.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(IndustryAdvisor $industryAdvisor) {
        abort_unless(auth()->user()->can('view-all-industryAdvisor'), 403);

        $industryAdvisor->load('student');

        return view('industry_advisor.show', compact('industryAdvisor'), ['title' => 'DETAIL PEMBIMBING LAPANGAN']);
    }

    public function edit(IndustryAdvisor $industryAdvisor) {
        abort_unless(auth()->user()->can('edit-industryAdvisor'), 403);

        return view('industry_advisor.edit', compact('industryAdvisor'), ['title' => 'EDIT PEMBIMBING LAPANGAN']);
    }

    public function update(UpdateIndustryAdvisorRequest $request, IndustryAdvisor $industryAdvisor) {
        $industryAdvisor->update($request->validated());

        return redirect()->route('industryAdvisor.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(IndustryAdvisor $industryAdvisor) {
        abort_unless(auth()->user()->can('delete-industryAdvisor'), 403);

        if ($industryAdvisor->student()->count() > 0) {
            return redirect()->route('industryAdvisor.index')->with('error', 'Tidak dapat menghapus data ini karena memiliki relasi dengan data yang lain.');
        }

        $industryAdvisor->delete();

        return redirect()->route('industryAdvisor.index')->with('success', 'Data berhasil dihapus.');
    }

    public function getData(Request $request) {
        if (!$request->ajax()){
            return response()->json(['error' => 'Invalid request'], 400);
        }
        
        $industryAdvisor = IndustryAdvisor::query();
    
        return DataTables::of($industryAdvisor)
            ->addColumn('action', function ($industryAdvisors) {
                return view('industry_advisor.partials.actions', compact('industryAdvisors'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
