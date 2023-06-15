@extends('layout.layout')
@section('title', $tagDetails->name)
@section('pages')

    <div>
        {{--tag background image--}}
        <div class="h-64 opacity-20 bg-no-repeat bg-cover bg-center absolute inset-0"
             style="background-image: linear-gradient(to bottom,transparent, rgb(255, 255, 255, 1)), url('{{url($tagDetails->image)}}');"
        ></div>

        {{--main content--}}
        <div class="mt-2">
            {{--header part--}}
            <div>
                <div class="h-40 w-40 rounded-full border-[0.875rem] border-amber-400 mx-auto overflow-hidden">
                    <img class="object-cover h-40 w-40" src="{{url($tagDetails->small_img)}}"/>
                </div>
                <h1 class=" text-center text-5xl font-bold mt-2">
                    {{$tagDetails->name}}
                </h1>
                <p class="mt-2 text-2xl w-[80%] text-center mx-auto font-thin">
                    {{$tagDetails->details}}
                </p>
            </div>
            {{--body part--}}
            <div class="mt-10">
                <p class="text-sm">11 POSTS</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-2">
                    @foreach([1,2,3,4,5,6] as $key => $value)
                        @includeIf('subviews.component.card')
                    @endforeach
                </div>
                <div class="flex justify-center my-8">
                    <button class="rounded-3xl bg-yellow-400 py-3 px-5 hover:px-7 font-bold text-lg transition-all duration-200">LOAD MORE</button>
                </div>
            </div>
        </div>
    </div>

@endsection
