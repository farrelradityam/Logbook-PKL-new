<x-layout>
<x-slot:title>{{$title}}</x-slot:title>

<table id="table" class="table table-bordered text-center">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($school as $school)
            <tr>
                <td>{{ $school->id}}</td>
                <td>{{ $school->name }}</td>
                <td>{{ $school->address }}</td>
                <td class="flex justify-center space-x-2 mb-3 mt-3">
                    <a href="{{ route('school.show', $school->id) }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-700 text-white rounded-md">Detail</a>
                    <a href="{{ route('school.edit', $school->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
                    <form action="{{ route('school.destroy', $school->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</x-layout>