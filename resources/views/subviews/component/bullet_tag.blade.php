<div class="flex items-center bg-slate-200 py-1 px-3.5 rounded-[20px]">
    <div class="w-2 h-2 rounded-full mr-2" style="background-color: {{!empty($tag->bullet_color) ? $tag->bullet_color : 'yellow'}}"></div>
    <p class="text-sm font-thin">{{!empty($tag->name) ? $tag->name : 'Food'}}</p>
</div>
