<x-layout>
<x-slot:title>{{$title}}</x-slot:title>
    
    <div class="container mx-auto mt-6 p-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold">ID Pembimbing Sekolah : {{ $mentor->id }}</h2>
            <p class="text-lg mt-4"><strong>Nama : </strong>{{ $mentor->name }}</p>
            <p class="text-lg mt-2"><strong>No.Telp : </strong>{{ $mentor->phone_number }}</p>
            <p class="text-lg mt-2"><strong>Siswa : </strong>
                @foreach ($mentor->student as $item)
                    <li>{{ $item->name }}</li>
                @endforeach
            </p>
            <p class="text-lg mt-2"><strong>Created At : </strong>{{ $mentor->created_at->format('d M Y H:i') }}</p>
            <p class="text-lg mt-2"><strong>Updated At : </strong>{{ $mentor->updated_at->format('d M Y H:i') }}</p>

            <div class=" space-x-3 mt-10 mb-3 ">
                <a href="{{ route('mentor.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-700 text-white rounded-md">Back</a>

                @can('edit-mentor')
                <a href="{{ route('mentor.edit', $mentor->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md">Edit</a>
                @endcan
            </div>
        </div>
    </div>
</x-layout>
