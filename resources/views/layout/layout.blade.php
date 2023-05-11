<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-100 font-regular">
    <header id="header" class="h-12 mt-4 lg:mt-10 sticky top-0 z-50">
        @includeIf('subviews.layout.header')
    </header>
    <main>
        <section class="lg:w-[1200px] lg:m-auto px-2">
            @yield('pages')
        </section>
    </main>
    <footer class="bg-white">
        @includeIf('subviews.layout.footer')
    </footer>
    <script src="{{asset('assets/js/commonFunction.js')}}"></script>
    <script defer>
        const header = CF.getElement('header');
        window.onscroll = function() {
            if(window.pageYOffset >= header.offsetTop)
                header.classList.add('is-pinned');
            else
                header.classList.remove('is-pinned');
        }
        @stack('scripts')
    </script>
</body>
</html>
