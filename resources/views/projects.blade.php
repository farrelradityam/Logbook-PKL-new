<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    @foreach ($projects as $project)
    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <a href="/projects/{{ $project['name'] }}" class="hover:underline">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $project['code'] }}</h2>
        </a>
        <div class="text-base text-gray-500" >
            <a href="#">{{ $project ['author'] }}</a> | {{ $project->created_at->diffForHumans() }}
        </div>
        <p class="my-4 font-light">{{ Str::limit($project ['name']) }}</p>
        <!-- <a href="/projects/{{ $project['name'] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a> -->
    </article>
    @endforeach
</x-layout>