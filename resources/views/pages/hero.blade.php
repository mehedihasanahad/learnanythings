@extends('layout.layout')
@section('title', 'Hero Page')
@section('pages')
    <div class="my-2 sm:flex justify-between h-[330px] sm:h-[350px] lg:h-[600px] items-center">
        <h1 class="hidden sm:block text-3xl w-1/2 font-bold text-fuchsia-700">
            THE BEST <span class="text-pink-400">EDUCATION</span> THEME
        </h1>
        <div class="header-svg
        top-[90px] right-[15%] bottom-0 left-[15%]
        sm:top-[108px] sm:right-[4%] sm:left-1/2
        lg:top-[148px] lg:right-[8%] lg:left-1/2">
            @includeIf('subviews.hero-svg')
        </div>
    </div>

    <div class="my-6">
        <h1>Popular Category</h1>
        <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-8 gap-2 mt-2">
            @foreach([1,2,3,4,5,6,7,8] as $key => $value)
                <div class="relative">
                    <img src="{{asset('assets/static/images/category.jpg')}}" class="h-24 w-full object-cover rounded-2xl"/>
                    <div class="absolute bottom-[5%] left-[5%] flex items-center bg-slate-200 py-1 px-3.5 rounded-[20px]">
                        <p class="text-sm font-thin">Food</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="my-6">
        <h1>What's New?</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="col-span-2">
                <div class="w-full bg-white shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)] rounded-md p-4">
                    asdfasdf
                </div>
            </div>
            <div class="col-span-1">
                <div>
                    asdf
                </div>
            </div>
        </div>
    </div>
@endsection
