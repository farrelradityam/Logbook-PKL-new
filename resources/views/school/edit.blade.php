<x-layout>
<x-slot:title>{{$title}}</x-slot:title>
    <form action="{{ route('school.update', $school->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div class="max-w-1g border border-slate-400 rounded-xl mx-auto shadow-lg font-inter p-5">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Sekolah</label>
            <input type="text" id="name" name="name" value="{{ $school->name }}" class="px-3 py-2 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500"/>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <label for="addres" class="block text-sm font-medium text-gray-700 mb-1 mt-5">Alamat School</label>
            <input type="text" id="address" name="address" value="{{ $school->address }}" class="px-3 py-2 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500"/>
            @error('address')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <div class="flex space-x-8">
                <label for="batch" class="block mb-4 w-1/2">
                    <span class="text-base block font-bold mt-3 mb-4">Pilih Tahun :</span>
                    <div class="space-y-2">
                        @foreach ($batches as $batch)
                            <label class="flex items-center">
                                <input type="checkbox" id="batch-{{ $batch->id }}" name="batch[]" value="{{ $batch->id }}" class="mr-2 rounded border-gray-500 text-blue-700 focus:ring-blue-500"
                                {{ $school->batchSchool->pluck('batch')->flatten()->pluck('id')->contains($batch->id) ? 'checked' : '' }}>
                                <label for="batch-{{ $batch->id }}">{{ $batch->year }}</label>
                            </label>
                        @endforeach
                    </div>
                    <p class="text-sm text-red-500 mt-2">* Pilih satu atau lebih tahun yang sesuai.</p>
                </label>

                <label for="major" class="block mb-4 w-1/2">
                    <span class="text-base block font-bold mt-3 mb-4">Pilih Jurusan :</span>
                    <div class="space-y-2">
                        @foreach ($majors as $major)
                            <label class="flex items-center">
                                <input type="checkbox" id="major-{{ $major->id }}" name="major[]" value="{{ $major->id }}" class="mr-2 rounded border-gray-500 text-blue-700 focus:ring-blue-500"
                                {{ $school->batchSchool->pluck('major')->flatten()->pluck('id')->contains($major->id) ? 'checked' : '' }}>
                                <label for="major-{{ $major->id }}">{{ $major->code }}</label>
                            </label>
                        @endforeach
                    </div>
                    <p class="text-sm text-red-500 mt-2">* Pilih satu atau lebih jurusan yang sesuai.</p>
                </label>
            </div>

            <div>
                <button type="submit" class="px-4 py-2 w-1/6 mt-5 bg-green-600 hover:bg-green-800 active:bg-green-800 focus:ring focus:ring-green-300 text-white rounded-md">Update</button>
            </div>
        </div>
    </form>
    
</x-layout>