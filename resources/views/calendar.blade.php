<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    
    <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Pilih data yang ingin anda kelola</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-3 mt-3">
        <a href="{{ route('batch.index') }}" class="text-3xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Tahun</a>
        <a href="{{ route('school.index') }}" class="text-3xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Sekolah</a>
        <a href="{{ route('major.index') }}" class="text-3xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Jurusan</a>
        <a href="{{ route('user.index') }}" class="text-3xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data User</a>
        <a href="{{ route('student.index') }}" class="text-3xl flex items-center justify-center text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Siswa</a>
        <a href="{{ route('mentor.index') }}" class="text-2xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Pembimbing Sekolah</a>
        <a href="{{ route('industryAdvisor.index') }}" class="text-2xl block text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Pembimbing Lapangan</a>
        <a href="{{ route('batch.index') }}" class="text-3xl flex items-center justify-center text-center w-full px-6 py-10 font-bold bg-white rounded-lg shadow-md hover:bg-violet-950 hover:text-white transition duration-500">Data Batch</a>
    </div>
</div>

</x-layout>