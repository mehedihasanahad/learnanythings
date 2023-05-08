<div class="lg:w-[1200px] lg:m-auto px-2">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-2.5 pt-16 pb-12">
        <div>
            <h1 class="font-bold text-xl">Social</h1>
            <br/>
            <a href="javascript:void(0)" class="flex">
                <div class="p-2 bg-sky-200 rounded-full mb-2">
                    <img class="w-4" src="{{asset('assets/static/images/facebook.svg')}}"/></div>
                <p class="ml-2">Facebook</p>
            </a>
            <a href="javascript:void(0)" class="flex">
                <div class="p-2 bg-sky-200 rounded-full">
                    <img class="w-4" src="{{asset('assets/static/images/twitter.svg')}}"/>
                </div>
                <p class="ml-2">Twitter</p>
            </a>
        </div>
        <div>
            <h1 class="font-bold text-xl">Latest posts</h1>
            <br/>
            @foreach([1,2,3] as $index=>$value)
                <article class="flex gap-x-1 mb-6">
                    <img class="w-20 h-20 object-cover rounded-md" src="{{asset('assets/static/images/dummy.jpeg')}}">
                    <h3 class="ml-2">Autumn is a second spring when every leaf is a flower</h3>
                </article>
            @endforeach
        </div>
        <div>
            <h1 class="font-bold text-xl">Latest posts</h1>
            <br/>
            <div class="flex gap-2 flex-wrap">
                @foreach([1,2,3,4,5] as $index=>$value)
                    <div class="flex items-center bg-slate-200 py-1 px-3.5 rounded-[20px]">
                        <div class="w-2 h-2 rounded-full mr-2 bg-violet-800"></div>
                        <p class="text-sm font-thin">Food</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <p class="pb-8">
        &copy; 2023 Neon - All right Reserved. Proudly Published with Ghost
    </p>
</div>
