<div id="NavbarArea" class="flex max-w-full w-full bg-gray-500 px-5 text-white py-3 justify-between">
    <span class="text-2xl">Wahyu Web</span>
    <span>
        <ul class="flex flex-row gap-5 align-middle items-center text-slate-300">
            <li class="{{ ($active === 'home') ? 'text-white' : 'text-slate-300' }}">
                <a href="/">home</a>
            </li>
            <li class="{{ ($active === 'posts') ? 'text-white' : 'text-slate-300' }}">
                <a href="/posts">postingan</a>
            </li>
            <li class="{{ ($active === 'category') ? 'text-white' : 'text-slate-300' }}">
                <a href="/category">kategori</a>
            </li>
            @auth
                <li class="{{ ($active === 'signin') ? 'text-white' : 'text-slate-300' }}">
                    <a href="/signout"><i class="ri-logout-box-r-line"></i> sign out</a>
                </li>
            @else
                <li class="{{ ($active === 'signin') ? 'text-white' : 'text-slate-300' }}">
                    <a href="/signin"><i class="ri-login-box-fill"></i> sign in</a>
                </li>
            @endauth
        </ul>
    </span>
</div>