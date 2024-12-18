<div class="flex justify-center space-x-2 mb-3 mt-3">
    @can('view-all-industryAdvisor')
    <a href="{{ route('industryAdvisor.show', $industryAdvisors->id) }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-700 text-white rounded-md">Detail</a>
    @endcan

    @can('edit-industryAdvisor')
    <a href="{{ route('industryAdvisor.edit', $industryAdvisors->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
    @endcan

    @can('delete-industryAdvisor')
    <form action="{{ route('industryAdvisor.destroy', $industryAdvisors->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</button>
    </form>
    @endcan
</div>
