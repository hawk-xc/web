@extends('dashboard.index')

@section('content')

<div id="container" class="flex flex-col w-full max-w-full">
    <h2 class="text-2xl font-semibold text-slate-800">hello {{ auth()->user()->name }}</h2>
    <span>this is your posts content</span>

    <div id="searchbar" class="flex flex-row w-full justify-center gap-28 mt-5">
        <form class="flex items-center md:w-[50rem] lg:w-[50rem]">   
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i data-feather="database" class="duration-150 transition-all w-[20px] opacity-60"></i>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300      text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full     ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400       dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="search posts content here...!!!" required>
            </div>
            <button type="submit" class="px-2 h-10 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg       border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300    dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <i data-feather="search" class="duration-150 transition-all w-[20px]"></i>
                <span class="sr-only">Search</span>
            </button>
        </form>
        <div  class="flex flex-row align-middle items-center bg-slate-300 text-slate-700 rounded-md h-10 gap-2 pl-2 overflow-hidden shadow">
            Add Posts
            <a href="/dashboard/posts/create" class="flex flex-row items-center align-middle p-2 bg-green-400 hover:bg-green-500 h-full text-white">
                <i data-feather="plus-circle" class="duration-150 transition-all w-[20px]"></i> 
            </a>
        </div>
    </div>
    
    <!-- component -->
    <div class="my-2 max-w-full w-full overflow-x-auto box-border">
        <div class="align-middle w-full overflow-hidden shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg flex flex-col items-center justify-center">
            <table class="w-full max-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">#</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Title</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Category</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Created At</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($posts as $post)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="flex items-center">
                                    <div>
                                        <div class="text-sm leading-5 text-gray-800">
                                            {{ $loop->iteration + ($posts->currentPage() * $loop->count) - $loop->count  }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900">{{ $post->title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  border-gray-500 text-sm leading-5">
                                {{ $post->Category->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-green-200opacity-50   rounded-full"></span>
                                <span class="relative text-xs">active</span>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500    text-blue-900 text-sm leading-5">
                                {{ $post->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 border-b border-gray-500 leading-5 flex flex-row gap-1">
                                <a href="/post/{{ $post->slug }}" class="px-2 h-9 aspect-square py-1 flex items-center align-middle justify-center border rounded-md bg-sky-300 hover:bg-sky-400 border-sky-500 text-white">
                                    <i id="icons" data-feather="eye" class="duration-150 transition-all w-[15px]"></i>
                                </a>
                                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="px-2 h-9 aspect-square py-1 flex items-center align-middle justify-center border rounded-md bg-green-500 hover:bg-green-600 border-green-700 text-white">
                                    <i id="icons" data-feather="edit" class="duration-150 transition-all w-[15px]"></i>
                                </a>
                                <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="px-2 py-1 h-9 aspect-square flex items-center align-middle justify-center border rounded-md bg-red-500 hover:bg-red-600 border-red-700 text-white" onclick="return confirm('are you sure?')">
                                        <i id="icons" data-feather="trash-2" class="duration-150 transition-all w-[15px]"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h2 class="mt-5 mb-3">{{ $posts->onEachSide(4)->links('pagination::default') }}</h2>
        </div>
    </div>
</div>

@if(session()->has('message'))
    <div id="msgBox" class="z-10 absolute bg-sky-300 border-l-4 border-sky-400 bg-opacity-50  rounded-sm text-slate-800 px-5 py-2 right-8 bottom-10 cursor-pointer flex flex-row">
      {{ session('message') }} <span id="closeButton" class="flex align-middle items-center justify-center flex-row hover:bg-sky-100 rounded-full aspect-square w-7 ml-5"><i data-feather="x" class="w-4 inline"></i></span>
    </div>
@endif

@endsection