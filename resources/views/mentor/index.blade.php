<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

    @if(session('error'))
        <div class="bg-red-600 text-white text-lg p-4 mb-4 rounded relative flex items-center justify-between" id="error-message">
            <span>{{ session('error') }}</span>
            <button type="button" class="text-white font-bold hover:text-gray-300 text-3xl mb-1" onclick="closeAlert('error-message')">&times;</button>
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-600 text-white text-lg p-4 mb-4 rounded relative flex items-center justify-between" id="success-message">
            <span>{{ session('success') }}</span>
            <button type="button" class="text-white font-bold hover:text-gray-300 text-3xl mb-1" onclick="closeAlert('success-message')">&times;</button>
        </div>
    @endif

    <script>
        function closeAlert(id) {
            document.getElementById(id).style.display = 'none';
        }
    </script>

    <div class="flex items-center justify-between">
        <h4 class="text-xl font-semibold mb-4">List Pembimbing Sekolah</h4>
        <div class="mb-5 ">
            @can('create-mentor')
            <a href="{{ route('mentor.create') }}" class="px-4 py-2 bg-teal-500 hover:bg-teal-700 text-white rounded-md ">Create Data</a>
            @endcan
        </div>
    </div>

    <div>
        <table id="mentor-table" class="table-auto w-full bg-gray-300 rounded-lg shadow">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-center w-2/12">ID</th>
                    <th class="px-4 py-2 text-center w-6/12">Nama</th>
                    <th class="px-4 py-2 justify-center w-4/12">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-200">

            </tbody>
        </table>
    </div>
</x-layout>