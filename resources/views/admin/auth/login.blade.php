<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body class="font-inter antialiased bg-slate-100 text-slate-600">
        <main class="bg-white">
            <div class="relative flex">
                <!-- Content -->
                <div class="w-full md:w-1/2">
                    <div class="min-h-screen h-full flex flex-col after:flex-1">
                        <!-- Header -->
                        <div class="flex-1">
                            <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
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
                        </div>
                        <div class="w-full max-w-sm mx-auto px-4 py-8">
                            <h1 class="text-3xl text-slate-800 font-bold mb-6">Welcome back! ✨</h1>

                            <!-- Form -->
                            <form method="POST" action="{{route('signin')}}">
                                @csrf
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="email">
                                        Email
                                    </label>
                                    <input  class="form-input w-full rounded" id="email" type="email" name="email" required="required" autofocus="autofocus">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="password">
                                        Password
                                    </label>
                                    <input  class="form-input w-full rounded" id="password" type="password" name="password" required="required" autocomplete="current-password">
                                </div>
                                <div class="flex items-center justify-between mt-6">
                                    <div class="mr-1">
                                        <a class="text-sm underline hover:no-underline" href="http://127.0.0.1:8081/forgot-password">
                                            Forgot Password?
                                        </a>
                                    </div>
                                    <button type="submit" class="py-2 px-3 rounded bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap ml-3">
                                        Sign in
                                    </button>
                                </div>
                            </form>
                            @if ($errors->any())
                                <div class="mt-4">
                                    <div class="px-4 py-2 rounded-sm text-sm bg-rose-100 border border-rose-200 text-rose-600">
                                        <div class="font-medium">Whoops! Something went wrong.</div>
                                        <ul class="mt-1 list-disc list-inside text-sm">
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <!-- Footer -->
                            <div class="pt-5 mt-6 border-t border-slate-200">
                                <div class="text-sm">
                                    Don&#039;t you have an account? <a class="font-medium text-indigo-500 hover:text-indigo-600" href="{{route('register')}}">Sign Up</a>
                                </div>
                                <!-- Warning -->
                                <div class="mt-5">
                                    <div class="bg-amber-100 text-amber-600 px-3 py-2 rounded">
                                        <svg class="inline w-3 h-3 shrink-0 fill-current" viewBox="0 0 12 12">
                                            <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                                        </svg>
                                        <span class="text-sm">
                                            To support you during the pandemic super pro features are free until March 31st.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Image -->
            <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true">
                <img class="object-cover object-center w-full h-full" src="{{asset('images/admin/auth-image.jpg')}}" width="760" height="1024" alt="Authentication image" />
                <img class="absolute top-1/4 left-0 -translate-x-1/2 ml-8 hidden lg:block" src="{{asset('images/admin/auth-decoration.png')}}" width="218" height="224" alt="Authentication decoration" />
            </div>
        </main>
    </body>
</html>
