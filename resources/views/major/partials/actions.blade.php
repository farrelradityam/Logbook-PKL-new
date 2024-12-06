<div class="flex justify-center space-x-2 mb-3 mt-3">
    @can('view-all-major')
    <a href="{{ route('major.show', $major->id) }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-700 text-white rounded-md">Detail</a>
    @endcan

    @can('edit-major')
    <a href="{{ route('major.edit', $major->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
    @endcan

    @can('delete-major')
    <form action="{{ route('major.destroy', $major->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</button>
    </form>
    @endcan
</div>
