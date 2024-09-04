<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="flex items-center justify-between">
        <h4 class="text-xl font-semibold mb-4">List Sekolah</h4>
        <div class="mb-5 ">
            <a href="{{ route('school.tambah') }}" class="px-4 py-2 bg-blue-500 hover:bg-sky-700 text-white rounded-md ">Tambah Data</a>
        </div>
    </div>
    
    <table class="table-auto w-full bg-gray-300 rounded-lg shadow">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Alamat</th>
                <th class="px-4 py-2">Aksi</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($schools as $school)
            <tr class="bg-white border-b">
                <td class="px-4 py-2 text-center">{{ $school->id }}</td>
                <td class="px-4 py-2 text-center">{{ $school->name }}</td>
                <td class="px-4 py-2 text-center">{{ $school->address }}</td>
                <td class="flex justify-center space-x-2 mb-3 mt-3">
                    <a href="{{ route('school.edit', $school->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
                    <form action="{{ route('school.delete', $school->id) }}" method="post">
                        @csrf
                        <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>