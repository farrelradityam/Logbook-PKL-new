<x-layout>
<x-slot:title>{{$title}}</x-slot:title>
    <form action="{{ route('student.update', $student->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div class="max-w-1g border border-slate-400 rounded-xl mx-auto shadow-lg font-inter p-5">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" id="name" name="name" value="{{ $student->name }}" class="px-3 py-2 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500"/>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1 mt-5">No.Telp</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ $student->phone_number }}" class="px-3 py-2 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500"/>
            @error('phone_number')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <label for="batch_school_major_id" class="block text-sm font-medium text-gray-700 mb-1 mt-3">Sekolah, Tahun, dan Jurusan</label>
            <select id="batch_school_major_id" name="batch_school_major_id" class="form-control px-3 py-2 border shadow rounded w-1/4 block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500">
                <option value="">-- Pilih --</option>
                @foreach($batchSchoolMajors as $bsm)
                    <option value="{{ $bsm->id }}"
                        {{ $student->batch_school_major_id == $bsm->id ? 'selected' : '' }}>
                        {{ $bsm->batchSchool->school->name }} - {{ $bsm->batchSchool->batch->year }} - {{ $bsm->major->code }}
                    </option>
                @endforeach
            </select>

            <label for="mentor_id" class="block text-sm font-medium text-gray-700 mb-1 mt-3">Pembimbing Sekolah</label>
            <select id="mentor_id" name="mentor_id" class="form-control px-3 py-2 border shadow rounded w-1/4 block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500">
                <option value="">-- Pilih --</option>
                @foreach($mentors as $mentor)
                    <option value="{{ $mentor->id }}"
                        {{ $student->mentor_id == $mentor->id ? 'selected' : '' }}>
                        {{ $mentor->name }}
                    </option>
                @endforeach
            </select>
            @error('mentor_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <label for="industry_advisor_id" class="block text-sm font-medium text-gray-700 mb-1 mt-3">Pembimbing Lapangan</label>
            <select id="industry_advisor_id" name="industry_advisor_id" class="form-control px-3 py-2 border shadow rounded w-1/4 block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500">
                <option value="">-- Pilih --</option>
                @foreach($industryAdvisors as $industryAdvisor)
                    <option value="{{ $industryAdvisor->id }}"
                        {{ $student->industry_advisor_id == $industryAdvisor->id ? 'selected' : '' }}>
                        {{ $industryAdvisor->name }}
                    </option>
                @endforeach
            </select>
            @error('industry_advisor_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            
            <div>
                <button type="submit" class="px-4 py-2 w-1/6 mt-5 bg-green-600 hover:bg-green-800 active:bg-green-800 focus:ring focus:ring-green-300 text-white rounded-md">Update</button>
            </div>
        </div>
    </form>
    
</x-layout>