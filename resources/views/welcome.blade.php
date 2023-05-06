<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    {{-- <style>
        .header-svg {
            position: absolute;
            top: 248px;
            right: 8%;
            bottom: 0;
            left: 50%;
            width: auto;
            height: fit-content;
            z-index: 1;
            background: url("{{asset('assets/header-bg.svg')}}") center 15% no-repeat;
            background-size: contain;
            overflow:visible;
        }
    </style>
      <div class="header-svg"> 
        @includeIf('subview.hero-svg')
      </div> --}}
      <main>
        <header>
            @includeIf('subviews.layout.header')
        </header>
        <section>
            @yield('pages')
        </section>
        <footer>
            @includeIf('subviews.layout.footer')
        </footer>
      </main>
      @stack('scripts')
</body>
</html>