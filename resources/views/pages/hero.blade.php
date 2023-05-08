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
@endsection
