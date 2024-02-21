@extends('particles.body')

@section('contain')
<div id="loginArea" class="columns-9 flex items-center flex-col h-screen max-h-full align-middle justify-center gap-3">

    <div class="columns-8 flex flex-col">
    @if (session()->has('message'))
    <div class="bg-orange-100 w-full border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
        <p class="font-bold">info</p>
        <p>{{ session('message') }}</p>
    </div>
    @endif

    @if (session()->has('loginError'))
    <div class="bg-orange-100 w-full max-w-full block border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
        <p class="font-bold">info</p>
        <p>{{ session('loginError') }}</p>
    </div>
    @endif
    </div>

    <span class="text-xl font-bold">Sign in to your account</span>
    <form action="/signin" method="POST" class="flex flex-col gap-2" id="target">
        @csrf
        <span class="block">Email address</span>
        <input name="email" type="email" class="duration-150 transition-all p-2 w-80 rounded-lg border focus:outline-blue-600 focus:bg-slate-100" value="{{ old('email') }}">
        
        @error('email')
            <span class="text-sm font-light text-red-600">{{ $message }}</span>
        @enderror

        <span class="block mt-4">password</span>
        <input name="password" type="password" class="duration-150 transition-all p-2 w-80 rounded-lg border focus:outline-blue-600 focus:bg-slate-100">

        @error('password')
            <span class="text-sm font-light text-red-600">{{ $message }}</span>
        @enderror

        <span class="block text-sm text-slate-600 mt-1">can't signin? register text <a href="/signup" class="font-bold text-blue-500 hover:underline">here</a></span>
        <button class="mt-6 block w-full bg-blue-400 hover:bg-blue-500 active:bg-blue-600 rounded-lg text-white font-semibold p-2" type="submit">Sign in</button>
    </form>
</div>

<script type="text/javascript">
var target = document.getElementById('target');

target.addEventListener('click', function() {
    target.scrollIntoView({ behavior: 'smooth' });
})
</script>

@endsection