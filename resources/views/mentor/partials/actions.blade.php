<div class="flex justify-center space-x-2 mb-3 mt-3">
    @can('view-all-mentor')
    <a href="{{ route('mentor.show', $mentor->id) }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-700 text-white rounded-md">Detail</a>
    @endcan

    @can('edit-mentor')
    <a href="{{ route('mentor.edit', $mentor->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
    @endcan

    @can('delete-mentor')
    <form action="{{ route('mentor.destroy', $mentor->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</button>
    </form>
    @endcan
</div>
