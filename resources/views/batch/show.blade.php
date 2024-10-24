<x-layout>
<x-slot:title>{{$title}}</x-slot:title>
    
    <div class="container mx-auto mt-6 p-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold">ID Batch : {{ $batch->id }}</h2>
            <p class="text-lg mt-4"><strong>Year : </strong>{{ $batch->year }}</p>
            <p class="text-lg mt-2"><strong>Created At : </strong>{{ $batch->created_at->format('d M Y H:i') }}</p>
            <p class="text-lg mt-2"><strong>Updated At : </strong>{{ $batch->updated_at->format('d M Y H:i') }}</p>

            <div class=" space-x-3 mt-10 mb-3 ">
                <a href="{{ route('batch.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-700 text-white rounded-md">Back</a>

                @if (auth()->user()->hasRole('admin-super'))
                <a href="{{ route('batch.edit', $batch->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
                @endif
            </div>
        </div>
    </div>
</x-layout>
