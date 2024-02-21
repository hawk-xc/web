@extends('main')

@section('contain')

<div class="flex flex-col">
    <span class="text-sm font-light">#{{ $post->category->name }}</span>
    <h2 class="text-2xl font-bold text-slate-700">{{ $post->title }}</h2>
    <span class="">Author : <a class="hover:underline" href="\posts?author={{ $post->User->username }}">{{ $post->User->name }}</a></span>
    <span class="mb-5 block text-[12px] text-slate-600">post {{ $post->created_at->diffForHumans() }}</span>
    @if ($post->image)
        <div id="image" class="w-56">
            <img src="{{ '/archive/' . $post->image }}" alt="{{ $post->slug . ' image'}}">
        </div>
    @endif
    <span>{!! $post->body !!}</span>
</div>
@endsection