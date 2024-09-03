<x-layout>
<x-slot:title>{{$title}}</x-slot:title>
    <form action="{{ route('batch.submit') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
            <input type="text" id="year" name="year" class="mt-1 block w-full border-green-700 rounded-md shadow-sm" required />
        </div>

        <div>
            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-800 active:bg-green-800 focus:ring focus:ring-green-300 text-white rounded-md">Simpan</button>
        </div>
    </form>
</x-layout>