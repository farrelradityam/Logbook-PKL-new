<div class="flex justify-center space-x-2 mb-3 mt-3">
    @can('view-all-school')
        <a href="{{ route('school.show', $school->id) }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-700 text-white rounded-md">Detail</a>
    @endcan
                    
    @can('edit-school')
        <a href="{{ route('school.edit', $school->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
    @endcan

    @can('delete-school')
        <form action="{{ route('school.destroy', $school->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</button>
        </form>
    @endcan
</div>
