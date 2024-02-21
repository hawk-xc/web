@extends('particles.body')

@section('contain')

<div id="loginArea" class="columns-9 flex items-center flex-col h-screen max-h-full align-middle justify-center gap-3">
    <span class="text-xl font-bold">Sign up to your account</span>
    <form action="/register" method="post" class="flex flex-col" id="target">
        @csrf
        <span class="block">Name</span>
        <input name="name" type="text" class="duration-150 transition-all p-2 w-80 rounded-lg border focus:outline-blue-600 focus:bg-slate-100" value="{{ old('name') }}">

        @error('name')
            <span class="text-sm font-light text-red-600">{{ $message }}</span>
        @enderror

        <span class="block mt-4">Username</span>
        <input name="username" type="text" class="duration-150 transition-all p-2 w-80 rounded-lg border focus:outline-blue-600 focus:bg-slate-100" value="{{ old('username') }}">

        @error('username')
            <span class="text-sm font-light text-red-600">{{ $message }}</span>
        @enderror

        <span class="block mt-4">Email address</span>
        <input name="email" type="email" class="duration-150 transition-all p-2 w-80 rounded-lg border focus:outline-blue-600 focus:bg-slate-100" value="{{ old('email') }}">

        @error('email')
            <span class="text-sm font-light text-red-600">{{ $message }}</span>
        @enderror

        <span class="block mt-4">password</span>
        <input name="password" type="password" class="duration-150 transition-all p-2 w-80 rounded-lg border focus:outline-blue-600 focus:bg-slate-100">

        @error('password')
            <span class="text-sm font-light text-red-600">{{ $message }}</span>
        @enderror

        <span class="block text-sm text-slate-600 mt-1">already have an account? login <a href="/signin" class="font-bold text-blue-500 hover:underline">here</a></span>
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