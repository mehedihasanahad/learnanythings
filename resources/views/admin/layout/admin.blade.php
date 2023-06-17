
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="XNYpInYLgNzvwEDCSAgPky6y0jY7SR3YAsvNAQNl">

    <title>@yield('admin_title', 'Admin')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>

    <!-- Styles -->
    <style>
        .dataTables_wrapper .dataTables_length select {
            min-width: 70px;
        }
        .edit-btn {
            border-radius: 2px;
            background: #86EFAC;
            padding: 6px;
            color: #166534;
            margin-left: 2px;
        }

        .delete-btn {
            border-radius: 2px;
            background: #FCA5A5;
            padding: 6px;
            color: #A61B1B;
            margin-left: 2px;
        }

        [wire\:loading], [wire\:loading\.delay], [wire\:loading\.inline-block], [wire\:loading\.inline], [wire\:loading\.block], [wire\:loading\.flex], [wire\:loading\.table], [wire\:loading\.grid], [wire\:loading\.inline-flex] {
            display: none;
        }

        [wire\:loading\.delay\.shortest], [wire\:loading\.delay\.shorter], [wire\:loading\.delay\.short], [wire\:loading\.delay\.long], [wire\:loading\.delay\.longer], [wire\:loading\.delay\.longest] {
            display:none;
        }

        [wire\:offline] {
            display: none;
        }

        [wire\:dirty]:not(textarea):not(input):not(select) {
            display: none;
        }

        input:-webkit-autofill, select:-webkit-autofill, textarea:-webkit-autofill {
            animation-duration: 50000s;
            animation-name: livewireautofill;
        }

        @keyframes livewireautofill { from {} }
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body
    class="font-regular antialiased bg-slate-100 text-slate-600"
    :class="{ 'sidebar-expanded': sidebarExpanded }"
    x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
    x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))"
>

<!-- Page wrapper -->
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    @includeIf('admin.subviews.layout.sidebar')
    <!-- Content area -->
    <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden " x-ref="contentarea">
        <header class="sticky top-0 bg-white border-b border-slate-200 z-30">
            @includeIf('admin.subviews.layout.header')
        </header>

        <main class="px-4 sm:px-6 lg:px-8 py-8">
            {{--success message--}}
            @if(Session::has('success'))
                <p class="w-full p-2 rounded bg-green-300 text-green-800">{{ Session::get('success') }}</p>
            @endif
            {{--Failed message--}}
            @if(Session::has('error'))
                <p class="w-full p-2 rounded bg-red-300 text-red-800">{{ Session::get('error') }}</p>
            @endif

            @yield('admin_pages')
        </main>
    </div>
</div>

<!-- Scripts -->
<script type="module" src="{{mix('/js/app.js')}}"></script>
<script src="{{asset('assets/scripts/js/jquery-3.6.4.min.js')}}"></script>
<script src="{{asset('assets/scripts/js/data-tables-1.13.4.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/richtexteditor/rte_theme_default.css')}}" />
<script type="text/javascript" src="{{asset('assets/richtexteditor/rte.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/richtexteditor/plugins/all_plugins.js')}}"></script>
<script src="{{asset('assets/js/commonFunction.js')}}"></script>
@stack('admin_script')
</body>
</html>
