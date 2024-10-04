<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    
    <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Select the data you want to manage</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-3 mt-3">
        <a href="{{ route('batch.index') }}" class="text-3xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Batch</a>
        <a href="{{ route('school.index') }}" class="text-3xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data School</a>
        <a href="{{ route('major.index') }}" class="text-3xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Major</a>
        <a href="{{ route('batch.index') }}" class="text-3xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Batch</a>
        <a href="{{ route('batch.index') }}" class="text-3xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Batch</a>
        <a href="{{ route('batch.index') }}" class="text-3xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Batch</a>
        <a href="{{ route('batch.index') }}" class="text-3xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Batch</a>
        <a href="{{ route('batch.index') }}" class="text-3xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Batch</a>
    </div>
</div>

</x-layout>