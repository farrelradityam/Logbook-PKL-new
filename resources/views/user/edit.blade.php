<x-layout>
<x-slot:title>{{$title}}</x-slot:title>
    <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="max-w-1g border border-slate-400 rounded-xl mx-auto shadow-lg font-inter p-5 space-y-6">
            <div>
                <h2 class="text-lg font-bold text-gray-700 mb-4">Edit User Info</h2>

                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="px-3 py-2 mb-3 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500"/>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="px-3 py-2 mb-3 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500"/>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <h2 class="text-lg font-bold text-gray-700 mb-4">Edit Roles</h2>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Roles:</label>
                    <div class="grid grid-cols-1 gap-2">
                        @foreach($roles as $role)
                            <label class="flex items-center">
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" 
                                    class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                    @if($user->roles->contains($role->id)) checked @endif>
                                <span>{{ $role->name }}</span>
                            </label>
                        @endforeach
                    </div>
                    <p class="text-sm text-red-500 mt-2">* Pilih satu atau lebih role yang sesuai.</p>
                </div>
            </div>
            
            <div>
                <button type="submit" class="px-4 py-2 w-1/6 mt-5 bg-green-600 hover:bg-green-800 active:bg-green-800 focus:ring focus:ring-green-300 text-white rounded-md">Update</button>
            </div>
        </div>
    </form>

    <form action="{{ route('user.updatePassword', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div class="max-w-1g border border-slate-400 rounded-xl mx-auto shadow-lg font-inter p-5">
            <h2 class="text-lg font-bold text-gray-700 mb-4">Edit Password</h2>

            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
            <input type="password" name="current_password" id="current_password" required class="px-3 py-2 mb-3 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500">
            @error('current_password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
            <input type="password" name="password" id="password" required class="px-3 py-2 mb-3 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="px-3 py-2 mb-3 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500">
            @error('password-confirmation')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        
            <div>
                <button type="submit" class="px-4 py-2 w-1/6 mt-5 bg-green-600 hover:bg-green-800 active:bg-green-800 focus:ring focus:ring-green-300 text-white rounded-md">Update</button>
            </div>
        </div>
    </form>
</x-layout>