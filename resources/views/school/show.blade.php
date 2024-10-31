<x-layout>
<x-slot:title>{{$title}}</x-slot:title>
    
    <div class="container mx-auto mt-6 p-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-medium">ID School : {{ $school->id }}</h2>
            <p class="text-lg mt-4"><strong>Name : </strong>{{ $school->name }}</p>
            <p class="text-lg mt-2"><strong>Address : </strong>{{ $school->address }}</p>
            <p class="text-lg mt-2"><strong>Created At : </strong>{{ $school->created_at->format('d M Y H:i') }}</p>
            <p class="text-lg mt-2"><strong>Updated At : </strong>{{ $school->updated_at->format('d M Y H:i') }}</p>

            <div class="space-x-3 mt-10 mb-3 ">
                <a href="{{ route('school.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-700 text-white rounded-md">Back</a>

                @if (auth()->user()->hasRole('admin-super'))
                <a href="{{ route('school.edit', $school->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
                @endif
            </div>
        </div>
    </div>
</x-layout>
