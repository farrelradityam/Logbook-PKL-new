<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    public function index() {
        abort_unless(auth()->user()->can('view-all-user'), 403);

        $roles = Role::all();

        $users = User::withTrashed()->get();
        return view('user.index', compact('users'), ['title' => 'CRUD USER']);
    }

    public function create() {
        abort_unless(auth()->user()->can('create-user'), 403);

        $roles = Role::all();

        return view('user.create',  compact('roles'), ['title' => 'CREATE USER']);
    }

    public function store(StoreUserRequest $request) {
        $user = User::create($request->validated());

        $user->syncRoles(Role::whereIn('id', $request->roles)->pluck('name')->toArray());

        return redirect()->route('user.index')->with('success', 'Data berhasil dibuat.');
    }

    public function show(User $user) {
        abort_unless(auth()->user()->can('view-all-user'), 403);

        return view('user.show', compact('user'), ['title' => 'DETAIL USER']);
    }
    public function edit(User $user) {
        abort_unless(auth()->user()->can('edit-user'), 403);

        $roles = Role::all();

        return view('user.edit', compact('user', 'roles'), ['title' => 'EDIT USER']);
    }

    public function update(UpdateUserRequest $request, User $user) {
        $user->update($request->validated());

        $user->syncRoles(Role::whereIn('id', $request->roles)->pluck('name')->toArray());

        return redirect()->route('user.index')->with('success', 'Data berhasil diupdate.');
    }

    public function updatePassword(Request $request, User $user) {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'Password berhasil diupdate.');
    }

    public function destroy(User $user) {
        abort_unless(auth()->user()->can('delete-user'), 403);
        
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus.');
    }

    public function restore($id) {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        
        return redirect()->route('user.index')->with('success', 'Data berhasil di-restore.');
    }

    public function impersonate(User $user) {
        abort_unless(auth()->user()->can('impersonate'), 403);

        if ($user->hasRole('admin-super')) {
            return redirect()->route('user.index')->with('error', 'Anda Tidak bisa melakukan impersonasi terhadap Admin Super.');
        }

        auth()->user()->impersonate($user);
        return redirect()->route('home')->with('success', 'Anda sekarang sedang impersonasi sebagai ' . $user->name);
    }

    public function stopImpersonate() {
        auth()->user()->leaveImpersonation();
        return redirect()->route('home')->with('error', 'Anda telah berhenti impersonasi.');
    }

    public function getData(Request $request) {
        if (!$request->ajax()) {
            return response()->json(['error' => 'Invalid request'], 400);
        }
        
        $users = User::withTrashed();
    
        return DataTables::of($users)
            ->addColumn('action', function (User $user) {
                return view('user.partials.actions', compact('user'))->render();
            })
            ->addColumn('roles', function (User $user) {
                return $user->roles->pluck('name')->implode(' , ');
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}
