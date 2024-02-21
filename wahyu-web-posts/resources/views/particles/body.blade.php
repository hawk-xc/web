<html class="">
    @vite('resources/css/app.css')
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
        rel="stylesheet"
    />
    @include('particles.navbar')

    <div class="container mx-auto px-28 py-5 h-screen">
        @yield('contain')
    </div>
    </div>
</html>