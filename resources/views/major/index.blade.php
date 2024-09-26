<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="flex items-center justify-between">
        <h4 class="text-xl font-semibold mb-4">List Major</h4>
        <div class="mb-5 ">
            <a href="{{ route('major.create') }}" class="px-4 py-2 bg-teal-500 hover:bg-teal-700 text-white rounded-md ">Create Data</a>
        </div>
    </div>

    <table id="major-table" class="table-auto w-full bg-gray-300 rounded-lg shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-center w-2/12">ID</th>
                <th class="px-4 py-2 text-center w-6/12">Code</th>
                <th class="px-4 py-2 text-center w-6/12">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white border-b"> 
            
        </tbody>
    </table>
</x-layout>
