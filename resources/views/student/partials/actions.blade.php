<div class="flex justify-center space-x-2 mb-3 mt-3">
    @can('view-all-student')
    <a href="{{ route('student.show', $student->id) }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-700 text-white rounded-md">Detail</a>
    @endcan

    @can('edit-student')
    <a href="{{ route('student.edit', $student->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
    @endcan

    @can('delete-student')
    <form action="{{ route('student.destroy', $student->id) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</button>
    </form>
    @endcan
</div>