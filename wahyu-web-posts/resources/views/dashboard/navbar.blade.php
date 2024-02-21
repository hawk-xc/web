<html class="">
    <div id="modeSlider" class="flex items-center align-middle justify-center p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-full duration-150 transition-all cursor-pointer">
        <i id="modeSwitchIcon" data-feather="moon" class="text-slate-500 dark:text-slate-300"></i>
    </div>
    <ul class="flex flex-row gap-3 items-center">
        {{-- add using <li></li> --}}
        <li>          
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-slate-600 dark:text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
                Hi {{ auth()->user()->username }} <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"  stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg  shadow-md w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"   aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600     dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600     dark:hover:text-white">Settings</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600     dark:hover:text-white">Earnings</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600     dark:hover:text-white">Sign out</a>
                </li>
                </ul>
            </div>
        </li>
    </ul>
</html>