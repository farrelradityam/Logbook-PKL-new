<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    @if(session('success'))
        <div id="success-message" class="bg-green-600 text-white text-lg p-4 mb-4 rounded relative flex items-center justify-between transition duration-500 ease-in-out transform">
            <div class="flex items-center space-x-2">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            <button type="button" class="text-white font-bold hover:text-gray-300 text-3xl mb-1" onclick="closeAlert('success-message')">&times;</button>
        </div>
    @endif

    <script>
        function closeAlert(id) {
            const element = document.getElementById(id);
            element.classList.add('opacity-0');
            setTimeout(function() {
                element.style.display = 'none';
            }, 500);
        }

        setTimeout(() => {
            closeAlert('success-message');
        }, 5000);
    </script>

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
                    @method('PUT')
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
