<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="flex items-center justify-between">
        <h4 class="text-xl font-semibold mb-4">List Batch</h4>
        <div class="mb-5 ">
            <a href="{{ route('batch.tambah') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md ">Tambah Data</a>
        </div>
    </div>

    <table class="table-auto w-full bg-gray-300 rounded-lg shadow">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Year</th>
                <th class="px-4 py-2">Created_at</th>
                <th class="px-4 py-2">Updated_at</th>
                <th class="px-4 py-2">Aksi</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($batches as $batch)
            <tr class="bg-white border-b">
                <td class="px-4 py-2 text-center">{{ $batch->id }}</td>
                <td class="px-4 py-2 text-center">{{ $batch->year }}</td>
                <td class="px-4 py-2 text-center">{{ $batch->created_at }}</td>
                <td class="px-4 py-2 text-center">{{ $batch->updated_at }}</td>
                <td class="flex justify-center space-x-2 mb-3 mt-3">
                    <a href="{{ route('batch.edit', $batch->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md">Edit</a>
                    <form action="{{ route('batch.delete', $batch->id) }}" method="post">
                        @csrf
                        <button class="px-4 py-2 bg-red-500 text-white rounded-md">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>