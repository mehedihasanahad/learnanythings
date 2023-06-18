@extends('admin.layout.admin')
@section('admin_title', 'Dashboard')
@section('admin_pages')
    <form action="{{route('series-content.update', Crypt::encryptString($seriesContent->id))}}" method="POST">
        @csrf
        @method('PUT')
        <div class="p-4 rounded-xl shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <label class="block" for="title"> Title <span class="text-rose-500">*</span>
                    <input class="form-input rounded w-full" id="title" type="text" name="title" placeholder="Recent Sports news" value="{{$seriesContent->title}}">
                    @error('title')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="blog_id"> Blog <span class="text-rose-500">*</span>
                    <select class="block rounded w-full max-h-14" id="blog_id" name="blog_id">
                        <option value="" selected disabled>Select Blog</option>
                        @foreach($blogs as $key => $blog)
                            <option value="{{$blog->id}}" {{($blog->id == $seriesContent->blog_id ? 'selected' : '')}}>{{$blog->title}}</option>
                        @endforeach
                    </select>
                    @error('blog_id')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="status"> Status <span class="text-rose-500">*</span>
                    <select class="block rounded form-select w-full" id="status" name="status">
                        <option value="1" {{$seriesContent->status ? 'selected' : ''}}>Active</option>
                        <option value="0" {{$seriesContent->status ? '' : 'selected'}}>Inactive</option>
                    </select>
                    @error('status')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>
            </div>
            <div class="mt-2">
                <label class="block" for="content"> Content <span class="text-rose-500">*</span>
                    <textarea id="content" name="content">{{$seriesContent->content}}</textarea>
                    @error('content')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <div class="flex items-end justify-end gap-x-2 mt-2">
                    <a href="{{route('permissions.index')}}" class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Back</a>
                    <button class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Update</button>
                </div>
            </div>
        </div>
    </form>
    @push('admin_script')
        <script>
            const editor2 = new RichTextEditor("#content", { skin: "rounded-corner", toolbar: "basic" });
        </script>
    @endpush
@endsection
