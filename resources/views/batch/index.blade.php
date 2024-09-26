<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="flex items-center justify-between">
        <h4 class="text-xl font-semibold mb-4">List Batch</h4>
        <div class="mb-5 ">
            <a href="{{ route('batch.create') }}" class="px-4 py-2 bg-teal-500 hover:bg-teal-700 text-white rounded-md ">Create Data</a>
        </div>
    </div>

    <table class="table-auto w-full bg-gray-300 rounded-lg shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-center w-2/12">ID</th>
                <th class="px-4 py-2 text-center w-6/12">Year</th>
                <th class="px-4 py-2 text-center w-4/12">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($batches as $batch)
            <tr class="bg-white border-b">
                <td class="px-4 py-2 text-center">{{ $batch->id }}</td>
                <td class="px-4 py-2 text-center">{{ $batch->year }}</td>
                <td class="flex justify-center space-x-2 mb-3 mt-3">
                    <a href="{{ route('batch.show', $batch->id) }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-700 text-white rounded-md">Detail</a>
                    <a href="{{ route('batch.edit', $batch->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
                    <form action="{{ route('batch.destroy', $batch->id) }}" method="post" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5">
        {{ $batches->links() }}
    </div>
</x-layout>
