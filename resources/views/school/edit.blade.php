<x-layout>
<x-slot:title>{{$title}}</x-slot:title>
    <form action="{{ route('school.update', $school->id) }}" method="POST" class="space-y-4">
        @csrf
        <div class="max-w-1g border border-slate-400 rounded-xl mx-auto shadow-lg font-inter p-5">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Sekolah</label>
            <input type="text" id="name" name="name" value="{{ $school->name }}" class="px-3 py-2 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500" required />
            <label for="addres" class="block text-sm font-medium text-gray-700 mb-1 mt-5">Alamat Sekolah</label>
            <input type="text" id="address" name="address" value="{{ $school->address }}" class="px-3 py-2 border shadow rounded w-full block text-sm focus:outline-none focus:ring-1 focus:ring-slate-500 focus:border-slate-500" required />
        </div>

        <div>
            <button type="submit" class=" px-4 py-2 w-1/6 bg-green-600 hover:bg-green-800 active:bg-green-800 focus:ring focus:ring-green-300 text-white rounded-md">Edit</button>
        </div>
    </form>
    
</x-layout>