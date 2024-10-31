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
        <h4 class="text-xl font-semibold mb-4">List School</h4>
        <div class="mb-5 ">
            @if (auth()->user()->hasRole('admin-super'))
            <a href="{{ route('school.create') }}" class="px-4 py-2 bg-teal-500 hover:bg-teal-700 text-white rounded-md ">Create Data</a>
            @endif
        </div>
    </div>

    <div>
        <table id="school-table" class="table-auto w-full bg-gray-300 rounded-lg shadow">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-center w-2/12">ID</th>
                    <th class="px-4 py-2 text-center w-6/12">Name</th>
                    <th class="px-4 py-2 justify-center w-4/12">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schools as $school)
                <tr class="bg-white border-b">
                    <td class="px-4 py-2 text-center ">{{ $school->id }}</td>
                    <td class="px-4 py-2 text-center ">{{ $school->name }}</td>
                    <td class="flex justify-center space-x-2 mb-3 mt-3">
                        @if (auth()->user()->hasAnyRole('admin-super', 'admin-pkl'))
                        <a href="{{ route('school.show', $school->id) }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-700 text-white rounded-md">Detail</a>
                        @endif

                        @if (auth()->user()->hasRole('admin-super'))
                        <a href="{{ route('school.edit', $school->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
                        <form action="{{ route('school.destroy', $school->id) }}" method="POST" onsubmit="return confirmDelete(event, this)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>