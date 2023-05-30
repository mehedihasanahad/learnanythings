
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="XNYpInYLgNzvwEDCSAgPky6y0jY7SR3YAsvNAQNl">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <!-- Livewire Styles -->
    <style >
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

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script type="module" src="{{asset('js/app.js')}}"></script>
</head>
<body
    class="font-inter antialiased bg-slate-100 text-slate-600"
    :class="{ 'sidebar-expanded': sidebarExpanded }"
    x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
    x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))"
>

<!-- Page wrapper -->
<div class="flex h-screen overflow-hidden">

    <div>
        <!-- Sidebar backdrop (mobile only) -->
        <div
            class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
            :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'"
            aria-hidden="true"
            x-cloak
        ></div>

        <!-- Sidebar -->
        <div
            id="sidebar"
            class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
            @click.outside="sidebarOpen = false"
            @keydown.escape.window="sidebarOpen = false"
            x-cloak="lg"
        >

            <!-- Sidebar header -->
            <div class="flex justify-between mb-10 pr-3 sm:px-2">
                <!-- Close button -->
                <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                    </svg>
                </button>
                <!-- Logo -->
                <a class="block" href="http://127.0.0.1:8081/dashboard">
                    <svg width="32" height="32" viewBox="0 0 32 32">
                        <defs>
                            <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                                <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%" />
                                <stop stop-color="#A5B4FC" offset="100%" />
                            </linearGradient>
                            <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                                <stop stop-color="#38BDF8" stop-opacity="0" offset="0%" />
                                <stop stop-color="#38BDF8" offset="100%" />
                            </linearGradient>
                        </defs>
                        <rect fill="#6366F1" width="32" height="32" rx="16" />
                        <path d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z" fill="#4F46E5" />
                        <path d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z" fill="url(#logo-a)" />
                        <path d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z" fill="url(#logo-b)" />
                    </svg>
                </a>
            </div>

            <!-- Links -->
            <div class="space-y-8">
                <!-- Pages group -->
                <div>
                    <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                        <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pages</span>
                    </h3>
                    <ul class="mt-3">
                        <!-- Dashboard -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 bg-slate-900" x-data="{ open: 1 }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 hover:text-slate-200" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-indigo-500" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />
                                            <path class="fill-current text-indigo-600" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />
                                            <path class="fill-current text-indigo-200" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z" />
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 rotate-180" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 " :class="open ? '!block' : 'hidden'">
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate !text-indigo-500" href="http://127.0.0.1:8081/dashboard">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Main</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Analytics</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Fintech</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- E-Commerce -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 " x-data="{ open: 0 }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 " href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-slate-400" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z" />
                                            <path class="fill-current text-slate-700" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z" />
                                            <path class="fill-current text-slate-600" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z" />
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">E-Commerce</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 " :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Customers</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Orders</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Invoices</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Shop</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Shop 2</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Single Product</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cart</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cart 2</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cart 3</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pay</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Community -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 " x-data="{ open: 0 }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 " href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-slate-600" d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z" />
                                            <path class="fill-current text-slate-400" d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z" />
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Community</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 " :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Users - Tabs</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Users - Tiles</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Profile</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Feed</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Forum</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Forum - Post</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Meetups</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Meetups - Post</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Finance -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 " x-data="{ open: 0 }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 " href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-slate-400" d="M13 6.068a6.035 6.035 0 0 1 4.932 4.933H24c-.486-5.846-5.154-10.515-11-11v6.067Z" />
                                            <path class="fill-current text-slate-700" d="M18.007 13c-.474 2.833-2.919 5-5.864 5a5.888 5.888 0 0 1-3.694-1.304L4 20.731C6.131 22.752 8.992 24 12.143 24c6.232 0 11.35-4.851 11.857-11h-5.993Z" />
                                            <path class="fill-current text-slate-600" d="M6.939 15.007A5.861 5.861 0 0 1 6 11.829c0-2.937 2.167-5.376 5-5.85V0C4.85.507 0 5.614 0 11.83c0 2.695.922 5.174 2.456 7.17l4.483-3.993Z" />
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Finance</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 " :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cards</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Transactions</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Transaction Details</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Job Board -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 " x-data="{ open: 0 }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 " href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-slate-700" d="M4.418 19.612A9.092 9.092 0 0 1 2.59 17.03L.475 19.14c-.848.85-.536 2.395.743 3.673a4.413 4.413 0 0 0 1.677 1.082c.253.086.519.131.787.135.45.011.886-.16 1.208-.474L7 21.44a8.962 8.962 0 0 1-2.582-1.828Z" />
                                            <path class="fill-current text-slate-600" d="M10.034 13.997a11.011 11.011 0 0 1-2.551-3.862L4.595 13.02a2.513 2.513 0 0 0-.4 2.645 6.668 6.668 0 0 0 1.64 2.532 5.525 5.525 0 0 0 3.643 1.824 2.1 2.1 0 0 0 1.534-.587l2.883-2.882a11.156 11.156 0 0 1-3.861-2.556Z" />
                                            <path class="fill-current text-slate-400" d="M21.554 2.471A8.958 8.958 0 0 0 18.167.276a3.105 3.105 0 0 0-3.295.467L9.715 5.888c-1.41 1.408-.665 4.275 1.733 6.668a8.958 8.958 0 0 0 3.387 2.196c.459.157.94.24 1.425.246a2.559 2.559 0 0 0 1.87-.715l5.156-5.146c1.415-1.406.666-4.273-1.732-6.666Zm.318 5.257c-.148.147-.594.2-1.256-.018A7.037 7.037 0 0 1 18.016 6c-1.73-1.728-2.104-3.475-1.73-3.845a.671.671 0 0 1 .465-.129c.27.008.536.057.79.146a7.07 7.07 0 0 1 2.6 1.711c1.73 1.73 2.105 3.472 1.73 3.846Z" />
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Job Board</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 " :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Listing</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Job Post</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Company Profile</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Tasks -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 " x-data="{ open: 0 }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 " href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-slate-600" d="M8 1v2H3v19h18V3h-5V1h7v23H1V1z" />
                                            <path class="fill-current text-slate-600" d="M1 1h22v23H1z" />
                                            <path class="fill-current text-slate-400" d="M15 10.586L16.414 12 11 17.414 7.586 14 9 12.586l2 2zM5 0h14v4H5z" />
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tasks</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 " :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Kanban</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">List</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Messages -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 ">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 " href="#0">
                                <div class="flex items-center justify-between">
                                    <div class="grow flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-slate-600" d="M14.5 7c4.695 0 8.5 3.184 8.5 7.111 0 1.597-.638 3.067-1.7 4.253V23l-4.108-2.148a10 10 0 01-2.692.37c-4.695 0-8.5-3.184-8.5-7.11C6 10.183 9.805 7 14.5 7z" />
                                            <path class="fill-current text-slate-400" d="M11 1C5.477 1 1 4.582 1 9c0 1.797.75 3.45 2 4.785V19l4.833-2.416C8.829 16.85 9.892 17 11 17c5.523 0 10-3.582 10-8s-4.477-8-10-8z" />
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Messages</span>
                                    </div>
                                    <!-- Badge -->
                                    <div class="flex flex-shrink-0 ml-2">
                                        <span class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-indigo-500 px-2 rounded">4</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- Inbox -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 ">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 " href="#0">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-slate-600" d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z" />
                                        <path class="fill-current text-slate-400" d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Inbox</span>
                                </div>
                            </a>
                        </li>
                        <!-- Calendar -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 ">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 " href="#0">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-slate-600" d="M1 3h22v20H1z" />
                                        <path class="fill-current text-slate-400" d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Calendar</span>
                                </div>
                            </a>
                        </li>
                        <!-- Campaigns -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 ">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 " href="#0">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-slate-600" d="M20 7a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 0120 7zM4 23a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 014 23z" />
                                        <path class="fill-current text-slate-400" d="M17 23a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 010-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1zM7 13a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 112 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Campaigns</span>
                                </div>
                            </a>
                        </li>
                        <!-- Settings -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 " x-data="{ open: 0 }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 " href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-slate-600" d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z" />
                                            <path class="fill-current text-slate-400" d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z" />
                                            <path class="fill-current text-slate-600" d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z" />
                                            <path class="fill-current text-slate-400" d="M19.707 9.292a3.012 3.012 0 00-1.415 1.415L13.286 5.7c-.4.195-.84.298-1.286.3a3 3 0 113-3 2.969 2.969 0 01-.3 1.286l5.007 5.006z" />
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Settings</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 " :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My Account</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My Notifications</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Connected Apps</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Plans</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Billing & Invoices</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Give Feedback</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Utility -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 " x-data="{ open: 0 }">
                            <a class="block text-slate-200 hover:text-white truncate transition duration-150 " href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <circle class="fill-current text-slate-400" cx="18.5" cy="5.5" r="4.5" />
                                            <circle class="fill-current text-slate-600" cx="5.5" cy="5.5" r="4.5" />
                                            <circle class="fill-current text-slate-600" cx="18.5" cy="18.5" r="4.5" />
                                            <circle class="fill-current text-slate-400" cx="5.5" cy="18.5" r="4.5" />
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Utility</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 " :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Changelog</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Roadmap</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">FAQs</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Empty State</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">404</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Knowledge Base</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- More group -->
                <div>
                    <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                        <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">More</span>
                    </h3>
                    <ul class="mt-3">
                        <!-- Authentication -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" x-data="{ open: false }">
                            <a class="block text-slate-200 transition duration-150" :class="open ? 'hover:text-slate-200' : 'hover:text-white'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-slate-600" d="M8.07 16H10V8H8.07a8 8 0 110 8z" />
                                            <path class="fill-current text-slate-400" d="M15 12L8 6v5H0v2h8v5z" />
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Authentication</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" :class="{ 'rotate-180': open }" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="{ 'hidden': !open }" x-cloak>
                                    <li class="mb-1 last:mb-0">
                                        <form method="POST" action="http://127.0.0.1:8081/logout" x-data>
                                            <input type="hidden" name="_token" value="XNYpInYLgNzvwEDCSAgPky6y0jY7SR3YAsvNAQNl">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="http://127.0.0.1:8081/logout" @click.prevent="$root.submit();">
                                                <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign In</span>
                                            </a>
                                        </form>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <form method="POST" action="http://127.0.0.1:8081/logout" x-data>
                                            <input type="hidden" name="_token" value="XNYpInYLgNzvwEDCSAgPky6y0jY7SR3YAsvNAQNl">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="http://127.0.0.1:8081/logout" @click.prevent="$root.submit();">
                                                <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign Up</span>
                                            </a>
                                        </form>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <form method="POST" action="http://127.0.0.1:8081/logout" x-data>
                                            <input type="hidden" name="_token" value="XNYpInYLgNzvwEDCSAgPky6y0jY7SR3YAsvNAQNl">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="http://127.0.0.1:8081/logout" @click.prevent="$root.submit();">
                                                <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Reset Password</span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Onboarding -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" x-data="{ open: false }">
                            <a class="block text-slate-200 transition duration-150" :class="open ? 'hover:text-slate-200' : 'hover:text-white'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-slate-600" d="M19 5h1v14h-2V7.414L5.707 19.707 5 19H4V5h2v11.586L18.293 4.293 19 5Z" />
                                            <path class="fill-current text-slate-400" d="M5 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm14 0a4 4 0 1 1 0-8 4 4 0 0 1 0 8ZM5 23a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm14 0a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z" />
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Onboarding</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" :class="{ 'rotate-180': open }" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Step 1</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Step 2</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Step 3</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Step 4</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Components -->
                        <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 " x-data="{ open: 0 }">
                            <a class="block text-slate-200 transition duration-150" :class="open ? 'hover:text-slate-200' : 'hover:text-white'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <circle class="fill-current text-slate-600" cx="16" cy="8" r="8" />
                                            <circle class="fill-current text-slate-400" cx="8" cy="16" r="8" />
                                        </svg>
                                        <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Components</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" :class="{ 'rotate-180': open }" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1 hidden" :class="open ? '!block' : 'hidden'">
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Button</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Input Form</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dropdown</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Alert & Banner</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Modal</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pagination</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tabs</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Breadcrumb</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Badge</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Avatar</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tooltip</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Accordion</span>
                                        </a>
                                    </li>
                                    <li class="mb-1 last:mb-0">
                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate " href="#0">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Icons</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Expand / collapse button -->
            <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
                <div class="px-3 py-2">
                    <button @click="sidebarExpanded = !sidebarExpanded">
                        <span class="sr-only">Expand / collapse sidebar</span>
                        <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                            <path class="text-slate-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                            <path class="text-slate-600" d="M3 23H1V1h2z" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
    <!-- Content area -->
    <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden " x-ref="contentarea">

        <header class="sticky top-0 bg-white border-b border-slate-200 z-30">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16 -mb-px">

                    <!-- Header: Left side -->
                    <div class="flex">

                        <!-- Hamburger button -->
                        <button
                            class="text-slate-500 hover:text-slate-600 lg:hidden"
                            @click.stop="sidebarOpen = !sidebarOpen"
                            aria-controls="sidebar"
                            :aria-expanded="sidebarOpen"
                        >
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <rect x="4" y="5" width="16" height="2" />
                                <rect x="4" y="11" width="16" height="2" />
                                <rect x="4" y="17" width="16" height="2" />
                            </svg>
                        </button>

                    </div>

                    <!-- Header: Right side -->
                    <div class="flex items-center space-x-3">

                        <!-- Search Button with Modal -->
                        <!-- Search button -->
                        <div x-data="{ searchOpen: false }">
                            <!-- Button -->
                            <button
                                class="w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 transition duration-150 rounded-full"
                                :class="{ 'bg-slate-200': searchOpen }"
                                @click.prevent="searchOpen = true;if (searchOpen) $nextTick(()=>{$refs.searchInput.focus()});"
                                aria-controls="search-modal"
                            >
                                <span class="sr-only">Search</span>
                                <svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-current text-slate-500" d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                                    <path class="fill-current text-slate-400" d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                                </svg>
                            </button>
                            <!-- Modal backdrop -->
                            <div
                                class="fixed inset-0 bg-slate-900 bg-opacity-30 z-50 transition-opacity"
                                x-show="searchOpen"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-out duration-100"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                aria-hidden="true"
                                x-cloak
                            ></div>
                            <!-- Modal dialog -->
                            <div
                                id="search-modal"
                                class="fixed inset-0 z-50 overflow-hidden flex items-start top-20 mb-4 justify-center px-4 sm:px-6"
                                role="dialog"
                                aria-modal="true"
                                x-show="searchOpen"
                                x-transition:enter="transition ease-in-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-4"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in-out duration-200"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-4"
                                x-cloak
                            >
                                <div
                                    class="bg-white overflow-auto max-w-2xl w-full max-h-full rounded shadow-lg"
                                    @click.outside="searchOpen = false"
                                    @keydown.escape.window="searchOpen = false"
                                >
                                    <!-- Search form -->
                                    <form class="border-b border-slate-200">
                                        <div class="relative">
                                            <label for="modal-search" class="sr-only">Search</label>
                                            <input id="modal-search" class="w-full border-0 focus:ring-transparent placeholder-slate-400 appearance-none py-3 pl-10 pr-4" type="search" placeholder="Search Anything…" x-ref="searchInput" />
                                            <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                                                <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 group-hover:text-slate-500 ml-4 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                                                    <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                    <div class="py-4 px-2">
                                        <!-- Recent searches -->
                                        <div class="mb-3 last:mb-0">
                                            <div class="text-xs font-semibold text-slate-400 uppercase px-2 mb-2">Recent searches</div>
                                            <ul class="text-sm">
                                                <li>
                                                    <a class="flex items-center p-2 text-slate-800 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                        <svg class="w-4 h-4 fill-current text-slate-400 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                                            <path d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z" />
                                                        </svg>
                                                        <span>Form Builder - 23 hours on-demand video</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center p-2 text-slate-800 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                        <svg class="w-4 h-4 fill-current text-slate-400 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                                            <path d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z" />
                                                        </svg>
                                                        <span>Access Mosaic on mobile and TV</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center p-2 text-slate-800 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                        <svg class="w-4 h-4 fill-current text-slate-400 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                                            <path d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z" />
                                                        </svg>
                                                        <span>Product Update - Q4 2021</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center p-2 text-slate-800 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                        <svg class="w-4 h-4 fill-current text-slate-400 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                                            <path d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z" />
                                                        </svg>
                                                        <span>Master Digital Marketing Strategy course</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center p-2 text-slate-800 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                        <svg class="w-4 h-4 fill-current text-slate-400 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                                            <path d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z" />
                                                        </svg>
                                                        <span>Dedicated forms for products</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center p-2 text-slate-800 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                        <svg class="w-4 h-4 fill-current text-slate-400 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                                            <path d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z" />
                                                        </svg>
                                                        <span>Product Update - Q4 2021</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Recent pages -->
                                        <div class="mb-3 last:mb-0">
                                            <div class="text-xs font-semibold text-slate-400 uppercase px-2 mb-2">Recent pages</div>
                                            <ul class="text-sm">
                                                <li>
                                                    <a class="flex items-center p-2 text-slate-800 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                        <svg class="w-4 h-4 fill-current text-slate-400 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                                            <path d="M14 0H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h8l5-5V1c0-.6-.4-1-1-1zM3 2h10v8H9v4H3V2z" />
                                                        </svg>
                                                        <span><span class="font-medium text-slate-800 group-hover:text-white">Messages</span> - Conversation / … / Mike Mills</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center p-2 text-slate-800 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                                        <svg class="w-4 h-4 fill-current text-slate-400 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                                            <path d="M14 0H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h8l5-5V1c0-.6-.4-1-1-1zM3 2h10v8H9v4H3V2z" />
                                                        </svg>
                                                        <span><span class="font-medium text-slate-800 group-hover:text-white">Messages</span> - Conversation / … / Eva Patrick</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Notifications button -->
                        <div class="relative inline-flex" x-data="{ open: false }">
                            <button
                                class="w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 transition duration-150 rounded-full"
                                :class="{ 'bg-slate-200': open }"
                                aria-haspopup="true"
                                @click.prevent="open = !open"
                                :aria-expanded="open"
                            >
                                <span class="sr-only">Notifications</span>
                                <svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-current text-slate-500" d="M6.5 0C2.91 0 0 2.462 0 5.5c0 1.075.37 2.074 1 2.922V12l2.699-1.542A7.454 7.454 0 006.5 11c3.59 0 6.5-2.462 6.5-5.5S10.09 0 6.5 0z" />
                                    <path class="fill-current text-slate-400" d="M16 9.5c0-.987-.429-1.897-1.147-2.639C14.124 10.348 10.66 13 6.5 13c-.103 0-.202-.018-.305-.021C7.231 13.617 8.556 14 10 14c.449 0 .886-.04 1.307-.11L15 16v-4h-.012C15.627 11.285 16 10.425 16 9.5z" />
                                </svg>
                                <div class="absolute top-0 right-0 w-2.5 h-2.5 bg-rose-500 border-2 border-white rounded-full"></div>
                            </button>
                            <div
                                class="origin-top-right z-10 absolute top-full -mr-48 sm:mr-0 min-w-80 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1 right-0"
                                @click.outside="open = false"
                                @keydown.escape.window="open = false"
                                x-show="open"
                                x-transition:enter="transition ease-out duration-200 transform"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-out duration-200"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                x-cloak
                            >
                                <div class="text-xs font-semibold text-slate-400 uppercase pt-1.5 pb-2 px-4">Notifications</div>
                                <ul>
                                    <li class="border-b border-slate-200 last:border-0">
                                        <a class="block py-2 px-4 hover:bg-slate-50" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                            <span class="block text-sm mb-2">📣 <span class="font-medium text-slate-800">Edit your information in a swipe</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</span>
                                            <span class="block text-xs font-medium text-slate-400">Feb 12, 2021</span>
                                        </a>
                                    </li>
                                    <li class="border-b border-slate-200 last:border-0">
                                        <a class="block py-2 px-4 hover:bg-slate-50" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                            <span class="block text-sm mb-2">📣 <span class="font-medium text-slate-800">Edit your information in a swipe</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</span>
                                            <span class="block text-xs font-medium text-slate-400">Feb 9, 2021</span>
                                        </a>
                                    </li>
                                    <li class="border-b border-slate-200 last:border-0">
                                        <a class="block py-2 px-4 hover:bg-slate-50" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                            <span class="block text-sm mb-2">🚀<span class="font-medium text-slate-800">Say goodbye to paper receipts!</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</span>
                                            <span class="block text-xs font-medium text-slate-400">Jan 24, 2020</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Info button -->
                        <div class="relative inline-flex" x-data="{ open: false }">
                            <button
                                class="w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 transition duration-150 rounded-full"
                                :class="{ 'bg-slate-200': open }"
                                aria-haspopup="true"
                                @click.prevent="open = !open"
                                :aria-expanded="open"
                            >
                                <span class="sr-only">Info</span>
                                <svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-current text-slate-500" d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z" />
                                </svg>
                            </button>
                            <div
                                class="origin-top-right z-10 absolute top-full min-w-44 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1 right-0"
                                @click.outside="open = false"
                                @keydown.escape.window="open = false"
                                x-show="open"
                                x-transition:enter="transition ease-out duration-200 transform"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-out duration-200"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                x-cloak
                            >
                                <div class="text-xs font-semibold text-slate-400 uppercase pt-1.5 pb-2 px-3">Need help?</div>
                                <ul>
                                    <li>
                                        <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                            <svg class="w-3 h-3 fill-current text-indigo-300 shrink-0 mr-2" viewBox="0 0 12 12">
                                                <rect y="3" width="12" height="9" rx="1" />
                                                <path d="M2 0h8v2H2z" />
                                            </svg>
                                            <span>Documentation</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                            <svg class="w-3 h-3 fill-current text-indigo-300 shrink-0 mr-2" viewBox="0 0 12 12">
                                                <path d="M10.5 0h-9A1.5 1.5 0 000 1.5v9A1.5 1.5 0 001.5 12h9a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0010.5 0zM10 7L8.207 5.207l-3 3-1.414-1.414 3-3L5 2h5v5z" />
                                            </svg>
                                            <span>Support Site</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                            <svg class="w-3 h-3 fill-current text-indigo-300 shrink-0 mr-2" viewBox="0 0 12 12">
                                                <path d="M11.854.146a.5.5 0 00-.525-.116l-11 4a.5.5 0 00-.015.934l4.8 1.921 1.921 4.8A.5.5 0 007.5 12h.008a.5.5 0 00.462-.329l4-11a.5.5 0 00-.116-.525z" />
                                            </svg>
                                            <span>Contact us</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Divider -->
                        <hr class="w-px h-6 bg-slate-200" />

                        <!-- User button -->
                        <div class="relative inline-flex" x-data="{ open: false }">
                            <button
                                class="inline-flex justify-center items-center group"
                                aria-haspopup="true"
                                @click.prevent="open = !open"
                                :aria-expanded="open"
                            >
{{--                                <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=m+h+a&amp;color=7F9CF5&amp;background=EBF4FF" width="32" height="32" alt="mehedi hasan ahad" />--}}
                                <div class="flex items-center truncate">
                                    <span class="truncate ml-2 text-sm font-medium group-hover:text-slate-800">mehedi hasan ahad</span>
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </button>
                            <div
                                class="origin-top-right z-10 absolute top-full min-w-44 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1 right-0"
                                @click.outside="open = false"
                                @keydown.escape.window="open = false"
                                x-show="open"
                                x-transition:enter="transition ease-out duration-200 transform"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-out duration-200"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                x-cloak
                            >
                                <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200">
                                    <div class="font-medium text-slate-800">mehedi hasan ahad</div>
                                    <div class="text-xs text-slate-500 italic">Administrator</div>
                                </div>
                                <ul>
                                    <li>
                                        <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="http://127.0.0.1:8081/user/profile" @click="open = false" @focus="open = true" @focusout="open = false">Settings</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="http://127.0.0.1:8081/logout" x-data>
                                            <input type="hidden" name="_token" value="XNYpInYLgNzvwEDCSAgPky6y0jY7SR3YAsvNAQNl">
                                            <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3"
                                               href="http://127.0.0.1:8081/logout"
                                               @click.prevent="$root.submit();"
                                               @focus="open = true"
                                               @focusout="open = false"
                                            >
                                                Sign Out
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <main>
            <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

                <!-- Welcome banner -->
                <div class="relative bg-indigo-200 p-4 sm:p-6 rounded-sm overflow-hidden mb-8">

                    <!-- Background illustration -->
                    <div class="absolute right-0 top-0 -mt-4 mr-16 pointer-events-none hidden xl:block" aria-hidden="true">
                        <svg width="319" height="198" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <path id="welcome-a" d="M64 0l64 128-64-20-64 20z" />
                                <path id="welcome-e" d="M40 0l40 80-40-12.5L0 80z" />
                                <path id="welcome-g" d="M40 0l40 80-40-12.5L0 80z" />
                                <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="welcome-b">
                                    <stop stop-color="#A5B4FC" offset="0%" />
                                    <stop stop-color="#818CF8" offset="100%" />
                                </linearGradient>
                                <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="welcome-c">
                                    <stop stop-color="#4338CA" offset="0%" />
                                    <stop stop-color="#6366F1" stop-opacity="0" offset="100%" />
                                </linearGradient>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <g transform="rotate(64 36.592 105.604)">
                                    <mask id="welcome-d" fill="#fff">
                                        <use xlink:href="#welcome-a" />
                                    </mask>
                                    <use fill="url(#welcome-b)" xlink:href="#welcome-a" />
                                    <path fill="url(#welcome-c)" mask="url(#welcome-d)" d="M64-24h80v152H64z" />
                                </g>
                                <g transform="rotate(-51 91.324 -105.372)">
                                    <mask id="welcome-f" fill="#fff">
                                        <use xlink:href="#welcome-e" />
                                    </mask>
                                    <use fill="url(#welcome-b)" xlink:href="#welcome-e" />
                                    <path fill="url(#welcome-c)" mask="url(#welcome-f)" d="M40.333-15.147h50v95h-50z" />
                                </g>
                                <g transform="rotate(44 61.546 392.623)">
                                    <mask id="welcome-h" fill="#fff">
                                        <use xlink:href="#welcome-g" />
                                    </mask>
                                    <use fill="url(#welcome-b)" xlink:href="#welcome-g" />
                                    <path fill="url(#welcome-c)" mask="url(#welcome-h)" d="M40.333-15.147h50v95h-50z" />
                                </g>
                            </g>
                        </svg>
                    </div>

                    <!-- Content -->
                    <div class="relative">
                        <h1 class="text-2xl md:text-3xl text-slate-800 font-bold mb-1">Good afternoon, mehedi hasan ahad 👋</h1>
                        <p>Here is what's happening with your projects today:</p>
                    </div>

                </div>
                <!-- Dashboard actions -->
                <div class="sm:flex sm:justify-between sm:items-center mb-8">

                    <!-- Left: Avatars -->
                    <ul class="flex flex-wrap justify-center sm:justify-start mb-8 sm:mb-0 -space-x-3 -ml-px">
{{--                        <li>--}}
{{--                            <a class="block" href="#0">--}}
{{--                                <img class="w-9 h-9 rounded-full" src="http://127.0.0.1:8081/images/user-36-01.jpg" width="36" height="36" alt="User 01" />--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="block" href="#0">--}}
{{--                                <img class="w-9 h-9 rounded-full" src="http://127.0.0.1:8081/images/user-36-02.jpg" width="36" height="36" alt="User 02" />--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="block" href="#0">--}}
{{--                                <img class="w-9 h-9 rounded-full" src="http://127.0.0.1:8081/images/user-36-03.jpg" width="36" height="36" alt="User 03" />--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="block" href="#0">--}}
{{--                                <img class="w-9 h-9 rounded-full" src="http://127.0.0.1:8081/images/user-36-04.jpg" width="36" height="36" alt="User 04" />--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <button class="flex justify-center items-center w-9 h-9 rounded-full bg-white border border-slate-200 hover:border-slate-300 text-indigo-500 shadow-sm transition duration-150 ml-2">--}}
{{--                                <span class="sr-only">Add new user</span>--}}
{{--                                <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16">--}}
{{--                                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                        </li>--}}
                    </ul>
                    <!-- Right: Actions -->
                    <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                        <!-- Filter button -->
                        <div class="relative inline-flex" x-data="{ open: false }">
                            <button
                                class="btn bg-white border-slate-200 hover:border-slate-300 text-slate-500 hover:text-slate-600"
                                aria-haspopup="true"
                                @click.prevent="open = !open"
                                :aria-expanded="open"
                            >
                                <span class="sr-only">Filter</span><wbr>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16">
                                    <path d="M9 15H7a1 1 0 010-2h2a1 1 0 010 2zM11 11H5a1 1 0 010-2h6a1 1 0 010 2zM13 7H3a1 1 0 010-2h10a1 1 0 010 2zM15 3H1a1 1 0 010-2h14a1 1 0 010 2z" />
                                </svg>
                            </button>
                            <div
                                class="origin-top-right z-10 absolute top-full min-w-56 bg-white border border-slate-200 pt-1.5 rounded shadow-lg overflow-hidden mt-1 right-0"
                                @click.outside="open = false"
                                @keydown.escape.window="open = false"
                                x-show="open"
                                x-transition:enter="transition ease-out duration-200 transform"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-out duration-200"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                x-cloak
                            >
                                <div class="text-xs font-semibold text-slate-400 uppercase pt-1.5 pb-2 px-4">Filters</div>
                                <ul class="mb-4">
                                    <li class="py-1 px-3">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox" checked />
                                            <span class="text-sm font-medium ml-2">Direct VS Indirect</span>
                                        </label>
                                    </li>
                                    <li class="py-1 px-3">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox" checked />
                                            <span class="text-sm font-medium ml-2">Real Time Value</span>
                                        </label>
                                    </li>
                                    <li class="py-1 px-3">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox" checked />
                                            <span class="text-sm font-medium ml-2">Top Channels</span>
                                        </label>
                                    </li>
                                    <li class="py-1 px-3">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox" />
                                            <span class="text-sm font-medium ml-2">Sales VS Refunds</span>
                                        </label>
                                    </li>
                                    <li class="py-1 px-3">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox" />
                                            <span class="text-sm font-medium ml-2">Last Order</span>
                                        </label>
                                    </li>
                                    <li class="py-1 px-3">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox" />
                                            <span class="text-sm font-medium ml-2">Total Spent</span>
                                        </label>
                                    </li>
                                </ul>
                                <div class="py-2 px-3 border-t border-slate-200 bg-slate-50">
                                    <ul class="flex items-center justify-between">
                                        <li>
                                            <button class="btn-xs bg-white border-slate-200 hover:border-slate-300 text-slate-500 hover:text-slate-600">Clear</button>
                                        </li>
                                        <li>
                                            <button class="btn-xs bg-indigo-500 hover:bg-indigo-600 text-white" @click="open = false" @focusout="open = false">Apply</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Datepicker built with flatpickr -->
                        <div class="relative">
                            <input class="datepicker form-input pl-9 text-slate-500 hover:text-slate-600 font-medium focus:border-slate-300 w-60" placeholder="Select dates" data-class="flatpickr-right" />
                            <div class="absolute inset-0 right-auto flex items-center pointer-events-none">
                                <svg class="w-4 h-4 fill-current text-slate-500 ml-3" viewBox="0 0 16 16">
                                    <path d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z" />
                                </svg>
                            </div>
                        </div>
                        <!-- Add view button -->
                        <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                            <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                                <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                            </svg>
                            <span class="hidden xs:block ml-2">Add View</span>
                        </button>

                    </div>

                </div>

                <!-- Cards -->
                <div class="grid grid-cols-12 gap-6">

                    <!-- Line chart (Acme Plus) -->
                    <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-slate-200">
                        <div class="px-5 pt-5">
                            <header class="flex justify-between items-start mb-2">
                                <!-- Icon -->
{{--                                <img src="http://127.0.0.1:8081/images/icon-01.svg" width="32" height="32" alt="Icon 01" />--}}
                                <!-- Menu button -->
                                <div class="relative inline-flex" x-data="{ open: false }">
                                    <button
                                        class="text-slate-400 hover:text-slate-500 rounded-full"
                                        :class="{ 'bg-slate-100 text-slate-500': open }"
                                        aria-haspopup="true"
                                        @click.prevent="open = !open"
                                        :aria-expanded="open"
                                    >
                                        <span class="sr-only">Menu</span>
                                        <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                            <circle cx="16" cy="16" r="2" />
                                            <circle cx="10" cy="16" r="2" />
                                            <circle cx="22" cy="16" r="2" />
                                        </svg>
                                    </button>
                                    <div
                                        class="origin-top-right z-10 absolute top-full right-0 min-w-36 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                                        @click.outside="open = false"
                                        @keydown.escape.window="open = false"
                                        x-show="open"
                                        x-transition:enter="transition ease-out duration-200 transform"
                                        x-transition:enter-start="opacity-0 -translate-y-2"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-out duration-200"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                    >
                                        <ul>
                                            <li>
                                                <a class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 1</a>
                                            </li>
                                            <li>
                                                <a class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 2</a>
                                            </li>
                                            <li>
                                                <a class="font-medium text-sm text-rose-500 hover:text-rose-600 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Remove</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </header>
                            <h2 class="text-lg font-semibold text-slate-800 mb-2">Acme Plus</h2>
                            <div class="text-xs font-semibold text-slate-400 uppercase mb-1">Sales</div>
                            <div class="flex items-start">
                                <div class="text-3xl font-bold text-slate-800 mr-2">$0</div>
                                <div class="text-sm font-semibold text-white px-1.5 bg-emerald-500 rounded-full">+49%</div>
                            </div>
                        </div>
                        <!-- Chart built with Chart.js 3 -->
                        <!-- Check out src/js/components/dashboard-card-01.js for config -->
                        <div class="grow">
                            <!-- Change the height attribute to adjust the chart height -->
                            <canvas id="dashboard-card-01" width="389" height="128"></canvas>
                        </div>
                    </div>

                    <!-- Line chart (Acme Advanced) -->
                    <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-slate-200">
                        <div class="px-5 pt-5">
                            <header class="flex justify-between items-start mb-2">
                                <!-- Icon -->
{{--                                <img src="http://127.0.0.1:8081/images/icon-02.svg" width="32" height="32" alt="Icon 02" />--}}
                                <!-- Menu button -->
                                <div class="relative inline-flex" x-data="{ open: false }">
                                    <button
                                        class="text-slate-400 hover:text-slate-500 rounded-full"
                                        :class="{ 'bg-slate-100 text-slate-500': open }"
                                        aria-haspopup="true"
                                        @click.prevent="open = !open"
                                        :aria-expanded="open"
                                    >
                                        <span class="sr-only">Menu</span>
                                        <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                            <circle cx="16" cy="16" r="2" />
                                            <circle cx="10" cy="16" r="2" />
                                            <circle cx="22" cy="16" r="2" />
                                        </svg>
                                    </button>
                                    <div
                                        class="origin-top-right z-10 absolute top-full right-0 min-w-36 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                                        @click.outside="open = false"
                                        @keydown.escape.window="open = false"
                                        x-show="open"
                                        x-transition:enter="transition ease-out duration-200 transform"
                                        x-transition:enter-start="opacity-0 -translate-y-2"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-out duration-200"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                    >
                                        <ul>
                                            <li>
                                                <a class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 1</a>
                                            </li>
                                            <li>
                                                <a class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 2</a>
                                            </li>
                                            <li>
                                                <a class="font-medium text-sm text-rose-500 hover:text-rose-600 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Remove</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </header>
                            <h2 class="text-lg font-semibold text-slate-800 mb-2">Acme Advanced</h2>
                            <div class="text-xs font-semibold text-slate-400 uppercase mb-1">Sales</div>
                            <div class="flex items-start">
                                <div class="text-3xl font-bold text-slate-800 mr-2">$0</div>
                                <div class="text-sm font-semibold text-white px-1.5 bg-amber-500 rounded-full">-14%</div>
                            </div>
                        </div>
                        <!-- Chart built with Chart.js 3 -->
                        <!-- Check out src/js/components/dashboard-card-02.js for config -->
                        <div class="grow">
                            <!-- Change the height attribute to adjust the chart height -->
                            <canvas id="dashboard-card-02" width="389" height="128"></canvas>
                        </div>
                    </div>

                    <!-- Line chart (Acme Professional) -->
                    <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-slate-200">
                        <div class="px-5 pt-5">
                            <header class="flex justify-between items-start mb-2">
                                <!-- Icon -->
{{--                                <img src="http://127.0.0.1:8081/images/icon-03.svg" width="32" height="32" alt="Icon 02" />--}}
                                <!-- Menu button -->
                                <div class="relative inline-flex" x-data="{ open: false }">
                                    <button
                                        class="text-slate-400 hover:text-slate-500 rounded-full"
                                        :class="{ 'bg-slate-100 text-slate-500': open }"
                                        aria-haspopup="true"
                                        @click.prevent="open = !open"
                                        :aria-expanded="open"
                                    >
                                        <span class="sr-only">Menu</span>
                                        <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                            <circle cx="16" cy="16" r="2" />
                                            <circle cx="10" cy="16" r="2" />
                                            <circle cx="22" cy="16" r="2" />
                                        </svg>
                                    </button>
                                    <div
                                        class="origin-top-right z-10 absolute top-full right-0 min-w-36 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                                        @click.outside="open = false"
                                        @keydown.escape.window="open = false"
                                        x-show="open"
                                        x-transition:enter="transition ease-out duration-200 transform"
                                        x-transition:enter-start="opacity-0 -translate-y-2"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-out duration-200"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                    >
                                        <ul>
                                            <li>
                                                <a class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 1</a>
                                            </li>
                                            <li>
                                                <a class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 2</a>
                                            </li>
                                            <li>
                                                <a class="font-medium text-sm text-rose-500 hover:text-rose-600 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Remove</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </header>
                            <h2 class="text-lg font-semibold text-slate-800 mb-2">Acme Professional</h2>
                            <div class="text-xs font-semibold text-slate-400 uppercase mb-1">Sales</div>
                            <div class="flex items-start">
                                <div class="text-3xl font-bold text-slate-800 mr-2">$0</div>
                                <div class="text-sm font-semibold text-white px-1.5 bg-emerald-500 rounded-full">+29%</div>
                            </div>
                        </div>
                        <!-- Chart built with Chart.js 3 -->
                        <!-- Check out src/js/components/dashboard-card-03.js for config -->
                        <div class="grow">
                            <!-- Change the height attribute to adjust the chart height -->
                            <canvas id="dashboard-card-03" width="389" height="128"></canvas>
                        </div>
                    </div>

                    <!-- Bar chart (Direct vs Indirect) -->
                    <div class="flex flex-col col-span-full sm:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
                        <header class="px-5 py-4 border-b border-slate-100">
                            <h2 class="font-semibold text-slate-800">Direct VS Indirect</h2>
                        </header>
                        <div id="dashboard-card-04-legend" class="px-5 py-3">
                            <ul class="flex flex-wrap"></ul>
                        </div>
                        <div class="grow">
                            <canvas id="dashboard-card-04" width="595" height="248"></canvas>
                        </div>
                    </div>
                    <!-- Line chart (Real Time Value) -->
                    <div class="flex flex-col col-span-full sm:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
                        <header class="px-5 py-4 border-b border-slate-100 flex items-center">
                            <h2 class="font-semibold text-slate-800">Real Time Value</h2>
                            <div class="relative ml-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                                <button
                                    class="block"
                                    aria-haspopup="true"
                                    :aria-expanded="open"
                                    @focus="open = true"
                                    @focusout="open = false" @click.prevent
                                >
                                    <svg class="w-4 h-4 fill-current text-slate-400" viewBox="0 0 16 16">
                                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"/>
                                    </svg>
                                </button>
                                <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                                    <div
                                        class="bg-white border border-slate-200 p-3 rounded shadow-lg overflow-hidden mb-2"
                                        x-show="open"
                                        x-transition:enter="transition ease-out duration-200 transform"
                                        x-transition:enter-start="opacity-0 translate-y-2"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-out duration-200"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                    >
                                        <div class="text-xs text-center whitespace-nowrap">Built with <a class="underline" @focus="open = true" @focusout="open = false" href="https://www.chartjs.org/" target="_blank">Chart.js</a></div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="px-5 py-3">
                            <div class="flex items-start">
                                <div class="text-3xl font-bold text-slate-800 mr-2 tabular-nums">$<span id="dashboard-card-05-value">57.81</span></div>
                                <div id="dashboard-card-05-deviation" class="text-sm font-semibold text-white px-1.5 rounded-full"></div>
                            </div>
                        </div>
                        <div class="grow">
                            <canvas id="dashboard-card-05" width="595" height="248"></canvas>
                        </div>
                    </div>
                    <!-- Doughnut chart (Top Countries) -->
                    <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-slate-200">
                        <header class="px-5 py-4 border-b border-slate-100"><h2 class="font-semibold text-slate-800">Top Countries</h2></header>
                        <div class="grow flex flex-col justify-center">
                            <div>
                                <canvas id="dashboard-card-06" width="389" height="260"></canvas>
                            </div>
                            <div id="dashboard-card-06-legend" class="px-5 pt-2 pb-6">
                                <ul class="flex flex-wrap justify-center -m-1"></ul>
                            </div>
                        </div>
                    </div>
                    <!-- Table (Top Channels) -->
                    <div class="col-span-full xl:col-span-8 bg-white shadow-lg rounded-sm border border-slate-200">
                        <header class="px-5 py-4 border-b border-slate-100">
                            <h2 class="font-semibold text-slate-800">Top Channels</h2>
                        </header>
                        <div class="p-3">

                            <!-- Table -->
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full">
                                    <!-- Table header -->
                                    <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm">
                                    <tr>
                                        <th class="p-2">
                                            <div class="font-semibold text-left">Source</div>
                                        </th>
                                        <th class="p-2">
                                            <div class="font-semibold text-center">Visitors</div>
                                        </th>
                                        <th class="p-2">
                                            <div class="font-semibold text-center">Revenues</div>
                                        </th>
                                        <th class="p-2">
                                            <div class="font-semibold text-center">Sales</div>
                                        </th>
                                        <th class="p-2">
                                            <div class="font-semibold text-center">Conversion</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <!-- Table body -->
                                    <tbody class="text-sm font-medium divide-y divide-slate-100">
                                    <!-- Row -->
                                    <tr>
                                        <td class="p-2">
                                            <div class="flex items-center">
                                                <svg class="shrink-0 mr-2 sm:mr-3" width="36" height="36" viewBox="0 0 36 36">
                                                    <circle fill="#24292E" cx="18" cy="18" r="18" />
                                                    <path d="M18 10.2c-4.4 0-8 3.6-8 8 0 3.5 2.3 6.5 5.5 7.6.4.1.5-.2.5-.4V24c-2.2.5-2.7-1-2.7-1-.4-.9-.9-1.2-.9-1.2-.7-.5.1-.5.1-.5.8.1 1.2.8 1.2.8.7 1.3 1.9.9 2.3.7.1-.5.3-.9.5-1.1-1.8-.2-3.6-.9-3.6-4 0-.9.3-1.6.8-2.1-.1-.2-.4-1 .1-2.1 0 0 .7-.2 2.2.8.6-.2 1.3-.3 2-.3s1.4.1 2 .3c1.5-1 2.2-.8 2.2-.8.4 1.1.2 1.9.1 2.1.5.6.8 1.3.8 2.1 0 3.1-1.9 3.7-3.7 3.9.3.4.6.9.6 1.6v2.2c0 .2.1.5.6.4 3.2-1.1 5.5-4.1 5.5-7.6-.1-4.4-3.7-8-8.1-8z" fill="#FFF" />
                                                </svg>
                                                <div class="text-slate-800">Github.com</div>
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">2.4K</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-emerald-500">$3,877</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">267</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-sky-500">4.7%</div>
                                        </td>
                                    </tr>
                                    <!-- Row -->
                                    <tr>
                                        <td class="p-2">
                                            <div class="flex items-center">
                                                <svg class="shrink-0 mr-2 sm:mr-3" width="36" height="36" viewBox="0 0 36 36">
                                                    <circle fill="#1DA1F2" cx="18" cy="18" r="18" />
                                                    <path d="M26 13.5c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4 0 1.6 1.1 2.9 2.6 3.2-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H10c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4c.7-.5 1.3-1.1 1.7-1.8z" fill="#FFF" fill-rule="nonzero" />
                                                </svg>
                                                <div class="text-slate-800">Twitter</div>
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">2.2K</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-emerald-500">$3,426</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">249</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-sky-500">4.4%</div>
                                        </td>
                                    </tr>
                                    <!-- Row -->
                                    <tr>
                                        <td class="p-2">
                                            <div class="flex items-center">
                                                <svg class="shrink-0 mr-2 sm:mr-3" width="36" height="36" viewBox="0 0 36 36">
                                                    <circle fill="#EA4335" cx="18" cy="18" r="18" />
                                                    <path d="M18 17v2.4h4.1c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C21.6 11.7 20 11 18.1 11c-3.9 0-7 3.1-7 7s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H18z" fill="#FFF" fill-rule="nonzero" />
                                                </svg>
                                                <div class="text-slate-800">Google (organic)</div>
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">2.0K</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-emerald-500">$2,444</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">224</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-sky-500">4.2%</div>
                                        </td>
                                    </tr>
                                    <!-- Row -->
                                    <tr>
                                        <td class="p-2">
                                            <div class="flex items-center">
                                                <svg class="shrink-0 mr-2 sm:mr-3" width="36" height="36" viewBox="0 0 36 36">
                                                    <circle fill="#4BC9FF" cx="18" cy="18" r="18" />
                                                    <path d="M26 14.3c-.1 1.6-1.2 3.7-3.3 6.4-2.2 2.8-4 4.2-5.5 4.2-.9 0-1.7-.9-2.4-2.6C14 19.9 13.4 15 12 15c-.1 0-.5.3-1.2.8l-.8-1c.8-.7 3.5-3.4 4.7-3.5 1.2-.1 2 .7 2.3 2.5.3 2 .8 6.1 1.8 6.1.9 0 2.5-3.4 2.6-4 .1-.9-.3-1.9-2.3-1.1.8-2.6 2.3-3.8 4.5-3.8 1.7.1 2.5 1.2 2.4 3.3z" fill="#FFF" fill-rule="nonzero" />
                                                </svg>
                                                <div class="text-slate-800">Vimeo.com</div>
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">1.9K</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-emerald-500">$2,236</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">220</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-sky-500">4.2%</div>
                                        </td>
                                    </tr>
                                    <!-- Row -->
                                    <tr>
                                        <td class="p-2">
                                            <div class="flex items-center">
                                                <svg class="shrink-0 mr-2 sm:mr-3" width="36" height="36" viewBox="0 0 36 36">
                                                    <circle fill="#0E2439" cx="18" cy="18" r="18" />
                                                    <path d="M14.232 12.818V23H11.77V12.818h2.46zM15.772 23V12.818h2.462v4.087h4.012v-4.087h2.456V23h-2.456v-4.092h-4.012V23h-2.461z" fill="#E6ECF4" />
                                                </svg>
                                                <div class="text-slate-800">Indiehackers.com</div>
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">1.7K</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-emerald-500">$2,034</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">204</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-sky-500">3.9%</div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- Line chart (Sales Over Time)  -->
                    <div class="flex flex-col col-span-full sm:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
                        <header class="px-5 py-4 border-b border-slate-100 flex items-center">
                            <h2 class="font-semibold text-slate-800">Sales Over Time (all stores)</h2>
                        </header>
                        <div class="px-5 py-3">
                            <div class="flex flex-wrap justify-between items-end">
                                <div class="flex items-start">
                                    <div class="text-3xl font-bold text-slate-800 mr-2">$1,482</div>
                                    <div class="text-sm font-semibold text-white px-1.5 bg-amber-500 rounded-full">-22%</div>
                                </div>
                                <div id="dashboard-card-08-legend" class="grow ml-2 mb-1">
                                    <ul class="flex flex-wrap justify-end"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="grow">
                            <canvas id="dashboard-card-08" width="595" height="248"></canvas>
                        </div>
                    </div>
                    <!-- Stacked bar chart (Sales VS Refunds) -->
                    <div class="flex flex-col col-span-full sm:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
                        <header class="px-5 py-4 border-b border-slate-100 flex items-center">
                            <h2 class="font-semibold text-slate-800">Sales VS Refunds</h2>
                            <div
                                class="relative ml-2"
                                x-data="{ open: false }"
                                @mouseenter="open = true"
                                @mouseleave="open = false"
                            >
                                <button
                                    class="block"
                                    href="#0"
                                    aria-haspopup="true"
                                    :aria-expanded="open"
                                    @focus="open = true"
                                    @focusout="open = false"
                                    @click.prevent
                                >
                                    <svg class="w-4 h-4 fill-current text-slate-400" viewBox="0 0 16 16">
                                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"/>
                                    </svg>
                                </button>
                                <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                                    <div
                                        class="min-w-72 bg-white border border-slate-200 p-3 rounded shadow-lg overflow-hidden mb-2"
                                        x-show="open"
                                        x-transition:enter="transition ease-out duration-200 transform"
                                        x-transition:enter-start="opacity-0 translate-y-2"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-out duration-200"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                    >
                                        <div class="text-sm">Sint occaecat cupidatat non proident, sunt in culpa qui
                                            officia deserunt mollit.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="px-5 py-3">
                            <div class="flex items-start">
                                <div class="text-3xl font-bold text-slate-800 mr-2">+$6,796</div>
                                <div class="text-sm font-semibold text-white px-1.5 bg-amber-500 rounded-full">-34%</div>
                            </div>
                        </div>
                        <div class="grow">
                            <canvas id="dashboard-card-09" width="595" height="248"></canvas>
                        </div>
                    </div>
                    <!-- Card (Customers)  -->
                    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-gray-200">
                        <header class="px-5 py-4 border-b border-gray-100">
                            <h2 class="font-semibold text-gray-800">Customers</h2>
                        </header>
                        <div class="p-3">

                            <!-- Table -->
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full">
                                    <!-- Table header -->
                                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Name</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Email</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Spent</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-center">Country</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <!-- Table body -->
                                    <tbody class="text-sm divide-y divide-gray-100">
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
{{--                                                    <img class="rounded-full" src="http://127.0.0.1:8081/images/user-36-05.jpg" width="40" height="40" alt="Alex Shatov" />--}}
                                                </div>
                                                <div class="font-medium text-gray-800">Alex Shatov</div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">alexshatov@gmail.com</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">$2,890.66</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">🇺🇸</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
{{--                                                    <img class="rounded-full" src="http://127.0.0.1:8081/images/user-36-06.jpg" width="40" height="40" alt="Philip Harbach" />--}}
                                                </div>
                                                <div class="font-medium text-gray-800">Philip Harbach</div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">philip.h@gmail.com</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">$2,767.04</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">🇩🇪</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
{{--                                                    <img class="rounded-full" src="http://127.0.0.1:8081/images/user-36-07.jpg" width="40" height="40" alt="Mirko Fisuk" />--}}
                                                </div>
                                                <div class="font-medium text-gray-800">Mirko Fisuk</div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">mirkofisuk@gmail.com</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">$1,220.66</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">🇫🇷</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
{{--                                                    <img class="rounded-full" src="http://127.0.0.1:8081/images/user-36-08.jpg" width="40" height="40" alt="Burak Long" />--}}
                                                </div>
                                                <div class="font-medium text-gray-800">Burak Long</div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">longburak@gmail.com</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">$1,890.66</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">🇬🇧</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
{{--                                                    <img class="rounded-full" src="http://127.0.0.1:8081/images/user-36-09.jpg" width="40" height="40" alt="Alex Shatov" />--}}
                                                </div>
                                                <div class="font-medium text-gray-800">Alex Shatov</div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">alexshatov@gmail.com</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">$2,890.66</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">🇺🇸</div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                    <!-- Card (Reasons for Refunds)   -->
                    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-gray-200">
                        <header class="px-5 py-4 border-b border-gray-100">
                            <h2 class="font-semibold text-gray-800">Reason for Refunds</h2>
                        </header>
                        <div class="px-5 py-3">
                            <div class="flex items-start">
                                <div class="text-3xl font-bold text-gray-800 mr-2">449</div>
                                <div class="text-sm font-semibold text-white px-1.5 bg-yellow-500 rounded-full">-22%</div>
                            </div>
                        </div>
                        <div class="grow">
                            <div class="grow flex flex-col justify-center">
                                <div>
                                    <canvas id="dashboard-card-11" width="595" height="48"></canvas>
                                </div>
                                <div id="dashboard-card-11-legend" class="px-5 pt-2 pb-2">
                                    <ul class="text-sm divide-y divide-gray-100"></ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card (Recent Activity) -->
                    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
                        <header class="px-5 py-4 border-b border-slate-100">
                            <h2 class="font-semibold text-slate-800">Recent Activity</h2>
                        </header>
                        <div class="p-3">

                            <!-- Card content -->
                            <!-- "Today" group -->
                            <div>
                                <header class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm font-semibold p-2">Today</header>
                                <ul class="my-1">
                                    <!-- Item -->
                                    <li class="flex px-2">
                                        <div class="w-9 h-9 rounded-full shrink-0 bg-indigo-500 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-indigo-50" viewBox="0 0 36 36">
                                                <path d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                            </svg>
                                        </div>
                                        <div class="grow flex items-center border-b border-slate-100 text-sm py-2">
                                            <div class="grow flex justify-between">
                                                <div class="self-center"><a class="font-medium text-slate-800 hover:text-slate-900" href="#0">Nick Mark</a> mentioned <a class="font-medium text-slate-800" href="#0">Sara Smith</a> in a new post</div>
                                                <div class="shrink-0 self-end ml-2">
                                                    <a class="font-medium text-indigo-500 hover:text-indigo-600" href="#0">View<span class="hidden sm:inline"> -&gt;</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex px-2">
                                        <div class="w-9 h-9 rounded-full shrink-0 bg-rose-500 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-rose-50" viewBox="0 0 36 36">
                                                <path d="M25 24H11a1 1 0 01-1-1v-5h2v4h12v-4h2v5a1 1 0 01-1 1zM14 13h8v2h-8z" />
                                            </svg>
                                        </div>
                                        <div class="grow flex items-center border-b border-slate-100 text-sm py-2">
                                            <div class="grow flex justify-between">
                                                <div class="self-center">The post <a class="font-medium text-slate-800" href="#0">Post Name</a> was removed by <a class="font-medium text-slate-800 hover:text-slate-900" href="#0">Nick Mark</a></div>
                                                <div class="shrink-0 self-end ml-2">
                                                    <a class="font-medium text-indigo-500 hover:text-indigo-600" href="#0">View<span class="hidden sm:inline"> -&gt;</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex px-2">
                                        <div class="w-9 h-9 rounded-full shrink-0 bg-emerald-500 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-emerald-50" viewBox="0 0 36 36">
                                                <path d="M15 13v-3l-5 4 5 4v-3h8a1 1 0 000-2h-8zM21 21h-8a1 1 0 000 2h8v3l5-4-5-4v3z" />
                                            </svg>
                                        </div>
                                        <div class="grow flex items-center text-sm py-2">
                                            <div class="grow flex justify-between">
                                                <div class="self-center"><a class="font-medium text-slate-800 hover:text-slate-900" href="#0">Patrick Sullivan</a> published a new <a class="font-medium text-slate-800" href="#0">post</a></div>
                                                <div class="shrink-0 self-end ml-2">
                                                    <a class="font-medium text-indigo-500 hover:text-indigo-600" href="#0">View<span class="hidden sm:inline"> -&gt;</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- "Yesterday" group -->
                            <div>
                                <header class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm font-semibold p-2">Yesterday</header>
                                <ul class="my-1">
                                    <!-- Item -->
                                    <li class="flex px-2">
                                        <div class="w-9 h-9 rounded-full shrink-0 bg-sky-500 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-sky-50" viewBox="0 0 36 36">
                                                <path d="M23 11v2.085c-2.841.401-4.41 2.462-5.8 4.315-1.449 1.932-2.7 3.6-5.2 3.6h-1v2h1c3.5 0 5.253-2.338 6.8-4.4 1.449-1.932 2.7-3.6 5.2-3.6h3l-4-4zM15.406 16.455c.066-.087.125-.162.194-.254.314-.419.656-.872 1.033-1.33C15.475 13.802 14.038 13 12 13h-1v2h1c1.471 0 2.505.586 3.406 1.455zM24 21c-1.471 0-2.505-.586-3.406-1.455-.066.087-.125.162-.194.254-.316.422-.656.873-1.028 1.328.959.878 2.108 1.573 3.628 1.788V25l4-4h-3z" />
                                            </svg>
                                        </div>
                                        <div class="grow flex items-center border-b border-slate-100 text-sm py-2">
                                            <div class="grow flex justify-between">
                                                <div class="self-center"><a class="font-medium text-slate-800 hover:text-slate-900" href="#0">240+</a> users have subscribed to <a class="font-medium text-slate-800" href="#0">Newsletter #1</a></div>
                                                <div class="shrink-0 self-end ml-2">
                                                    <a class="font-medium text-indigo-500 hover:text-indigo-600" href="#0">View<span class="hidden sm:inline"> -&gt;</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex px-2">
                                        <div class="w-9 h-9 rounded-full shrink-0 bg-indigo-500 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-indigo-50" viewBox="0 0 36 36">
                                                <path d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                            </svg>
                                        </div>
                                        <div class="grow flex items-center text-sm py-2">
                                            <div class="grow flex justify-between">
                                                <div class="self-center">The post <a class="font-medium text-slate-800" href="#0">Post Name</a> was suspended by <a class="font-medium text-slate-800 hover:text-slate-900" href="#0">Nick Mark</a></div>
                                                <div class="shrink-0 self-end ml-2">
                                                    <a class="font-medium text-indigo-500 hover:text-indigo-600" href="#0">View<span class="hidden sm:inline"> -&gt;</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <!-- Card (Income/Expenses) -->
                    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
                        <header class="px-5 py-4 border-b border-slate-100">
                            <h2 class="font-semibold text-slate-800">Income/Expenses</h2>
                        </header>
                        <div class="p-3">

                            <!-- Card content -->
                            <!-- "Today" group -->
                            <div>
                                <header class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm font-semibold p-2">Today</header>
                                <ul class="my-1">
                                    <!-- Item -->
                                    <li class="flex px-2">
                                        <div class="w-9 h-9 rounded-full shrink-0 bg-rose-500 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-rose-50" viewBox="0 0 36 36">
                                                <path d="M17.7 24.7l1.4-1.4-4.3-4.3H25v-2H14.8l4.3-4.3-1.4-1.4L11 18z" />
                                            </svg>
                                        </div>
                                        <div class="grow flex items-center border-b border-slate-100 text-sm py-2">
                                            <div class="grow flex justify-between">
                                                <div class="self-center"><a class="font-medium text-slate-800 hover:text-slate-900" href="#0">Qonto</a> billing</div>
                                                <div class="shrink-0 self-start ml-2">
                                                    <span class="font-medium text-slate-800">-$49.88</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex px-2">
                                        <div class="w-9 h-9 rounded-full shrink-0 bg-emerald-500 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-emerald-50" viewBox="0 0 36 36">
                                                <path d="M18.3 11.3l-1.4 1.4 4.3 4.3H11v2h10.2l-4.3 4.3 1.4 1.4L25 18z" />
                                            </svg>
                                        </div>
                                        <div class="grow flex items-center border-b border-slate-100 text-sm py-2">
                                            <div class="grow flex justify-between">
                                                <div class="self-center"><a class="font-medium text-slate-800 hover:text-slate-900" href="#0">Cruip.com</a> Market Ltd 70 Wilson St London</div>
                                                <div class="shrink-0 self-start ml-2">
                                                    <span class="font-medium text-emerald-500">+249.88</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex px-2">
                                        <div class="w-9 h-9 rounded-full shrink-0 bg-emerald-500 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-emerald-50" viewBox="0 0 36 36">
                                                <path d="M18.3 11.3l-1.4 1.4 4.3 4.3H11v2h10.2l-4.3 4.3 1.4 1.4L25 18z" />
                                            </svg>
                                        </div>
                                        <div class="grow flex items-center border-b border-slate-100 text-sm py-2">
                                            <div class="grow flex justify-between">
                                                <div class="self-center"><a class="font-medium text-slate-800 hover:text-slate-900" href="#0">Notion Labs Inc</a></div>
                                                <div class="shrink-0 self-start ml-2">
                                                    <span class="font-medium text-emerald-500">+99.99</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex px-2">
                                        <div class="w-9 h-9 rounded-full shrink-0 bg-emerald-500 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-emerald-50" viewBox="0 0 36 36">
                                                <path d="M18.3 11.3l-1.4 1.4 4.3 4.3H11v2h10.2l-4.3 4.3 1.4 1.4L25 18z" />
                                            </svg>
                                        </div>
                                        <div class="grow flex items-center border-b border-slate-100 text-sm py-2">
                                            <div class="grow flex justify-between">
                                                <div class="self-center"><a class="font-medium text-slate-800 hover:text-slate-900" href="#0">Market Cap Ltd</a></div>
                                                <div class="shrink-0 self-start ml-2">
                                                    <span class="font-medium text-emerald-500">+1,200.88</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex px-2">
                                        <div class="w-9 h-9 rounded-full shrink-0 bg-slate-200 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-slate-400" viewBox="0 0 36 36">
                                                <path d="M21.477 22.89l-8.368-8.367a6 6 0 008.367 8.367zm1.414-1.413a6 6 0 00-8.367-8.367l8.367 8.367zM18 26a8 8 0 110-16 8 8 0 010 16z" />
                                            </svg>
                                        </div>
                                        <div class="grow flex items-center border-b border-slate-100 text-sm py-2">
                                            <div class="grow flex justify-between">
                                                <div class="self-center"><a class="font-medium text-slate-800 hover:text-slate-900" href="#0">App.com</a> Market Ltd 70 Wilson St London</div>
                                                <div class="shrink-0 self-start ml-2">
                                                    <span class="font-medium text-slate-800 line-through">+$99.99</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Item -->
                                    <li class="flex px-2">
                                        <div class="w-9 h-9 rounded-full shrink-0 bg-rose-500 my-2 mr-3">
                                            <svg class="w-9 h-9 fill-current text-rose-50" viewBox="0 0 36 36">
                                                <path d="M17.7 24.7l1.4-1.4-4.3-4.3H25v-2H14.8l4.3-4.3-1.4-1.4L11 18z" />
                                            </svg>
                                        </div>
                                        <div class="grow flex items-center text-sm py-2">
                                            <div class="grow flex justify-between">
                                                <div class="self-center"><a class="font-medium text-slate-800 hover:text-slate-900" href="#0">App.com</a> Market Ltd 70 Wilson St London</div>
                                                <div class="shrink-0 self-start ml-2">
                                                    <span class="font-medium text-slate-800">-$49.88</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </main>

    </div>
</div>
</body>
</html>