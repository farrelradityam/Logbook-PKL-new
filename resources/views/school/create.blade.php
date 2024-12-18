<x-layout>
<x-slot:title>{{$title}}</x-slot:title>
    <form action="{{ route('school.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="max-w-1g border border-slate-400 rounded-xl mx-auto shadow-lg font-inter p-5">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Sekolah</label>
            <input type="text" id="name" name="name" class="px-3 py-2 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500"/>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            
            <label for="addres" class="block text-sm font-medium text-gray-700 mb-1 mt-3">Alamat School</label>
            <input type="text" id="address" name="address" class="px-3 py-2 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500"/>
            @error('address')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <div class="flex space-x-8">
                <label for="batch" class="block mb-4 w-1/2">
                    <span class="text-base block font-bold mt-3 mb-4">Pilih Tahun :</span>
                    <div class="space-y-2">
                        @foreach ($batches as $batch)
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="batch[]" value="{{ $batch->id }}" class="mr-2 rounded border-gray-500 text-blue-700 focus:ring-blue-500">
                                    {{ isset($school) && $school->batch->contains($batch->id) ? 'checked' : '' }}
                                    <span>{{ $batch->year }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <p class="text-sm text-red-500 mt-2">* Pilih satu atau lebih tahun yang sesuai.</p>
                </label>

                <label for="major" class="block mb-4 w-1/2">
                    <span class="text-base block font-bold mt-3 mb-4">Pilih Jurusan :</span>
                    <div class="space-y-2">
                        @foreach ($majors as $major)
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="major[]" value="{{ $major->id }}" class="mr-2 rounded border-gray-500 text-blue-700 focus:ring-blue-500">
                                    {{ isset($school) && $school->major->contains($major->id) ? 'checked' : '' }}
                                    <span>{{ $major->code }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <p class="text-sm text-red-500 mt-2">* Pilih satu atau lebih jurusan yang sesuai.</p>
                </label>
            </div>


            <div>
                <button type="submit" class="px-4 py-2 w-1/6 mt-5 bg-green-600 hover:bg-green-800 active:bg-green-800 focus:ring focus:ring-green-300 text-white rounded-md">Save</button>
            </div>
        </div>
    </form>
</x-layout>