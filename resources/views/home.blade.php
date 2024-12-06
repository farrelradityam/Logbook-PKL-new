<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    @if(session('error'))
        <div id="error-message" class="bg-red-600 text-white text-lg p-4 mb-4 rounded relative flex items-center justify-between transition duration-500 ease-in-out transform">
            <span>{{ session('error') }}</span>
            <button type="button" class="text-white font-bold hover:text-gray-200 text-3xl mb-1" onclick="closeAlert('error-message')">&times;</button>
        </div>
    @endif

    @if(session('success'))
        <div id="success-message" class="bg-green-600 text-white text-lg p-4 mb-4 rounded relative flex items-center justify-between transition duration-500 ease-in-out transform">
            <span>{{ session('success') }}</span>
            <button type="button" class="text-white font-bold hover:text-gray-200 text-3xl mb-1" onclick="closeAlert('success-message')">&times;</button>
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
        }, 3500);

        setTimeout(() => {
            closeAlert('error-message');
        }, 3500);
    </script>

    <h3 class="text-xl">ini adalah halaman Home</h3>
</x-layout>