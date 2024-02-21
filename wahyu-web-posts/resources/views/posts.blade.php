@extends('particles.body')

@section('contain')

<h2 class="text-2xl font-bold text-slate-700 mb-4">Halaman {{ $title }}</h2>


<form>   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        @if (request('category'))
            <input type="text" name="category" value="{{ request('category') }}" class="hidden">
        @endif
        @if (request('author'))
        <input type="text" name="author" value="{{ request('author') }}" class="hidden">
        @endif
        <input name="search" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by title, excerpt, content, and author" value="{{ request('search') }}">
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>

@if ($posts->count())
<div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 my-5">
    <span class="text-sm text-sky-600 hover:underline"><a href="/posts?category={{ $posts[0]->category->name }}">#{{ $posts[0]->category->name }}</a></span>
    <a href="#">
        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $posts[0]->title }}</h5>
    </a>
    <span class="mb-6">Author : <a class="hover:underline" href="/posts?author={{ $posts[0]->User->username }}{{ request('category') ? '&category=' . request('category') : null}}">{{ $posts[0]->User->name }}</a></span>
    <span class="block text-[12px] text-slate-600">post {{ $posts[0]->created_at->diffForHumans() }}</span>
    <p class="my-3 font-normal text-gray-700 dark:text-gray-400">
        {{ $posts[0]->excerpt }}
    </p>
    <a href="/post/{{ $posts[0]->slug }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Read more
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>
</div>


<div class="flex w-full max-w-full md:flex-wrap lg:flex-wrap max-sm:flex-col justify-between">
    @foreach ($posts->skip(1) as $post)
        <div href="#" class="flex flex-col p-5 shadow-md rounded-md box-border lg:w-2/4 md:w-2/4 max-sm:w-full hover:bg-slate-50 border cursor-pointer">
            <a class="text-sky-500 hover:text-sky-600 hover:underline" href="/posts?category={{ $post->category->name }}{{ request('author') ? '&author=' . request('author') : null}}">#{{ $post->category->name }}
            </a>
            <h2 class="text-2xl">{{ $post->title }}</h2>
            <p>Author : <a class="hover:underline" href="/posts?author={{ $post->User->username }}">{{ $post->User->name }}</a></p>
            <span class="block text-[12px] text-slate-600">post {{ $post->created_at->diffForHumans() }}</span>
            <span class="my-3">{{ $post->excerpt }}</span>
            <a href="/post/{{ $post->slug }}" class="inline-flex items-center text-blue-600 hover:underline">
                Read more
                <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                </svg>
            </a>
        </div>
    @endforeach
</div>
<h2 class="mt-5 mb-3">{{ $posts->onEachSide(4)->links('pagination::default') }}</h2>
@else
<div class="flex w-full max-w-full justify-between mt-10 align-middle items-center columns-1">
    <h2 class="flex text-2xl font-bold text-slate-700 mx-auto mt-10">data tidak ditemukan!!!</h2>
</div>
@endif
@endsection