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
                            <h1 class="text-3xl text-slate-800 font-bold mb-6">Create your Account ✨</h1>
                            <!-- Form -->
                            <form method="POST" action="{{route('login.store')}}">
                                @csrf
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="name">
                                            Full Name <span class="text-rose-500">*</span>
                                        </label>
                                        <input  class="form-input w-full rounded" value="{{old('name')}}" id="name" type="text" name="name" required="required" autofocus="autofocus" autocomplete="name">
                                        @error('name')
                                            <p class="text-red-700">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="email">
                                            Email Address <span class="text-rose-500">*</span>
                                        </label>
                                        <input  class="form-input w-full rounded" value="{{old('email')}}" id="email" type="email" name="email" required="required">
                                        @error('email')
                                            <p class="text-red-700">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="password">
                                            Password <span class="text-rose-500">*</span>
                                        </label>
                                        <input  class="form-input w-full rounded" id="password" value="{{old('password')}}" type="password" name="password" required="required" autocomplete="new-password">
                                        @error('password')
                                            <p class="text-red-700">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="password_confirmation">
                                            Confirm Password <span class="text-rose-500">*</span>
                                        </label>
                                        <input  class="form-input w-full rounded" id="password_confirmation" value="{{old('password_confirmation')}}" type="password" name="password_confirmation" required="required" autocomplete="new-password">
                                        @error('password_confirmation')
                                            <p class="text-red-700">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex items-center justify-between mt-6">
                                    <div class="mr-1">
                                        <label class="flex items-center" id="newsletter">
                                            <input type="checkbox" name="newsletter" class="form-checkbox" {{(old('newsletter'))? 'checked': ''}}/>
                                            <span class="text-sm ml-2">Email me about blog news.</span>
                                        </label>
                                    </div>
                                    <button type="submit" class="py-2 px-3 rounded bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">
                                        Sign Up
                                    </button>
                                </div>
                            </form>

                            <!-- Footer -->
                            <div class="pt-5 mt-6 border-t border-slate-200">
                                <div class="text-sm">
                                    Have an account? <a class="font-medium text-indigo-500 hover:text-indigo-600" href="http://127.0.0.1:8081/login">Sign In</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image -->
                <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true">
                    <img class="object-cover object-center w-full h-full" src="http://127.0.0.1:8081/images/auth-image.jpg" width="760" height="1024" alt="Authentication image" />
                    <img class="absolute top-1/4 left-0 -translate-x-1/2 ml-8 hidden lg:block" src="http://127.0.0.1:8081/images/auth-decoration.png" width="218" height="224" alt="Authentication decoration" />
                </div>
            </div>
        </main>
    </body>
</html>
