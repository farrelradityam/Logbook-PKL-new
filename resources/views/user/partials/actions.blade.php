<div class="flex justify-center space-x-2 mb-3 mt-3">
    @if (!$user->trashed())
        @can('view-all-user')
            <a href="{{ route('user.show', $user->id) }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-700 text-white rounded-md">Detail</a>
        @endcan

        @can('edit-user')
            <a href="{{ route('user.edit', $user->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
        @endcan

        @can('impersonate')
            <form action="{{ route('impersonate.start', $user->id) }}" method="GET">
                @csrf
                <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Impersonate</button>
            </form>
        @endcan
    @endif

    @can('delete-user')
        @if ($user->trashed())
            <form action="{{ route('user.restore', $user->id) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-md">Restore</button>
            </form>
        @else
            <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</button>
            </form>
        @endif
    @endcan
</div>