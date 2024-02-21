<ul>
    <li>
        <div class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-500 via-pink-500 to-red-500">
            W<span id="fullNameWeb" class="hidden">@web</span>
        </div>
    </li>
    <div class="border-t border-gray-500 my-4"></div>
    {{-- dashboard --}}
    <li class="lists duration-150 transition-all cursor-pointer {{ Request::is('dashboard') ? 'text-white' : 'text-slate-400' }} hover:text-white">
        <a href="/dashboard" class="flex flex-row lists p-2 gap-2">
            <i id="icons" data-feather="layers" class="duration-150 transition-all"></i>
            <span class="icon_titles duration-150 transition-all hidden">dashboard</span>
        </a>
    </li>
    {{-- posts --}}
    <li class="lists duration-150 transition-all cursor-pointer {{ Request::is('dashboard/posts*') ? 'text-white' : 'text-slate-400' }} hover:text-white">
        <a href="/dashboard/posts" class="flex flex-row lists p-2 gap-2">
            <i id="icons" data-feather="book-open" class="duration-150 transition-all"></i>
            <span class="icon_titles duration-150 transition-all hidden">posts</span>
        </a>
    </li>
    {{-- bookmark --}}
    <li class="lists duration-150 transition-all cursor-pointer {{ Request::is('dashboard/category*') ? 'text-white' : 'text-slate-400' }} hover:text-white">
        <a href="/dashboard/categories" class="flex flex-row lists p-2 gap-2">
            <i id="icons" data-feather="tag" class="duration-150 transition-all"></i>
            <span class="icon_titles duration-150 transition-all hidden">category</span>
        </a>
    </li>
    {{-- dropdown --}}
    <li class="lists duration-150 transition-all cursor-pointer {{ Request::is('dashboard/dropdown') ? 'text-white' : 'text-slate-400' }} hover:text-white">
        <li id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="text-slate-400 cursor-pointer p-2 flex gap-2 text-center items-center" type="button">
            <i id="icons" data-feather="sliders" class="duration-150 transition-all"></i> <span class="icon_titles hidden flex flex-row gap-2">
                Dropdown <i id="icons" data-feather="chevron-down" class="duration-150 transition-all"></i>
            </span>
        </li>  
            <!-- Dropdown menu -->
        <div id="dropdownDivider" class="z-10 hidden bg-white divide-ydivide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100  dark:hover:bg-gray-600    dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100  dark:hover:bg-gray-600    dark:hover:text-white">Settings</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100  dark:hover:bg-gray-600    dark:hover:text-white">Earnings</a>
                </li>
            </ul>
        </div>           
    </li>
    <li class="lists duration-150 transition-all cursor-pointer {{ Request::is('dashboard/bookmark*') ? 'text-white' : 'text-slate-400' }} hover:text-white">
        <a href="/" class="flex flex-row lists p-2 gap-2">
            <i id="icons" data-feather="trello" class="duration-150 transition-all"></i>
            <span class="icon_titles duration-150 transition-all hidden">web</span>
        </a>
    </li>
</ul>
<ul class="w-full md:flex lg:flex justify-center align-bottom items-center max-sm:hidden">
    <li id="toggleButton" class="bg-slate-700 hover:scale-110 duration-150 transition-all cursor-pointer rounded-full p-2 text-white">
        <i id="toggleIcon" data-feather="arrow-right" class="arrow duration-150 transition-all"></i>
    </li>
</ul>