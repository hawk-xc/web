<html class="">
    {{-- resources calling --}}
    @include('dashboard.resources')

    {{-- main --}}
    <div id="mainContainer" class="flex overflow-auto h-screen flex-col w-full max-w-full dark:bg-slate-700">
        {{-- navbar --}}
        <div id="navbar" class="bg-white dark:bg-slate-700 fixed flex justify-end shadow-lg px-5 py-4 z-1 top-0 w-full max-w-full">
            @include('dashboard.navbar')
        </div>

        {{-- sidebar --}}
        <div id="sidebar" class="absolute h-screen p-5 z-3 flex justify-between flex-col gap-2 bg-slate-800">
            @include('dashboard.sidebar')
        </div>

        {{-- content --}}
        <div id="mainbar" class="z-2 flex w-full dark:bg-slate-700 h-screen max-w-full pl-[7rem] pt-[6rem] pr-[3rem] box-border flex-wrap">
            @yield('content')
        </div>
    </div>
</html>