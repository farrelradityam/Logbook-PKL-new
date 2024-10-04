<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <body class="bg-gray-100">
        <div class="container mx-auto">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Profile Details</h3>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4 w-1/2">
                        <label for="name" class="block text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" required class="mt-1 block w-full p-2 border border-gray-400 rounded-md">
                    </div>
                    <div class="mb-4 w-1/2">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" required class="mt-1 block w-full p-2 border border-gray-400 rounded-md">
                    </div>

                    <button type="submit" class="px-4 py-2 mt-3 bg-slate-800 text-gray-100 rounded-lg hover:bg-slate-700 hover:text-gray-50 transition">Save Changes</button>
                </form>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6 mt-4">
                <h3 class="text-xl font-semibold mb-4">Update Password</h3>
                <form action="{{ route('profile.updatePassword') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-4 w-1/2">
                        <label for="current_password" class="block text-gray-700">Current Password</label>
                        <input type="password" name="current_password" id="current_password" required class="mt-1 block w-full p-2 border border-gray-400 rounded-md">
                    </div>

                    <div class="mb-4 w-1/2">
                        <label for="password" class="block text-gray-700">New Password</label>
                        <input type="password" name="password" id="password" required class="mt-1 block w-full p-2 border border-gray-400 rounded-md">
                    </div>

                    <div class="mb-4 w-1/2">
                        <label for="password_confirmation" class="block text-gray-700">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full p-2 border border-gray-400 rounded-md">
                    </div>

                    <button type="submit" class="px-4 py-2 mt-3 bg-slate-800 text-gray-100 rounded-lg hover:bg-slate-700 hover:text-gray-50 transition">Update Password</button>
                </form>
            </div>
        </div>
    </body>
</x-layout>
