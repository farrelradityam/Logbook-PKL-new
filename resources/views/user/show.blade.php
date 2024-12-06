<x-layout>
<x-slot:title>{{$title}}</x-slot:title>
    
    <div class="container mx-auto mt-6 p-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold">ID User : {{ $user->id }}</h2>
            <p class="text-lg mt-4"><strong>Name : </strong>{{ $user->name }}</p>
            <p class="text-lg mt-2"><strong>Email : </strong>{{ $user->email }}</p>
            <p class="text-lg mt-2"><strong>Role : </strong>{{ $user->roles->pluck('name')->implode(', ') }}</p>
            <p class="text-lg mt-2"><strong>Created At : </strong>{{ $user->created_at->format('d M Y H:i') }}</p>
            <p class="text-lg mt-2"><strong>Updated At : </strong>{{ $user->updated_at->format('d M Y H:i') }}</p>

            <div class=" space-x-3 mt-10 mb-3 ">
                <a href="{{ route('user.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-700 text-white rounded-md">Back</a>

                @can('edit-user')
                <a href="{{ route('user.edit', $user->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
                @endcan
            </div>
        </div>
    </div>
</x-layout>