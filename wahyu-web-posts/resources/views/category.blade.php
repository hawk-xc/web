@extends('particles.body')

@section('contain')
<h2 class="text-2xl font-bold text-slate-700">{{ $title }}</h2>

<div id="categoryContainer" class="flex flex-wrap max-w-full w-full gap-5">
    @foreach ($categories as $category)
        <a href="\posts?category={{ $category->name }}">
            <div class="bg-sky-200 even:bg-green-200 hover:scale-105 mt-5 duration-75 cursor-pointer    transition-all ease-in-out flex p-5 rounded-md shadow-md flex-col items-center align-middle    justify-center">
                <span class="text-sky-600">#{{ $category->name }}</span>
                <span class="text-sm font-light">total {{ $category->post->count() }} posts</span>
            </div>
        </a>
    @endforeach
</div>
@endsection