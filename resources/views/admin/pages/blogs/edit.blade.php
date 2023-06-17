@extends('admin.layout.admin')
@section('admin_title', 'Dashboard')
@section('admin_pages')
    <form action="{{route('blogs.update', Crypt::encryptString($blog->id))}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="p-4 rounded-xl shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <label class="block" for="title"> Title <span class="text-rose-500">*</span>
                    <input class="form-input rounded w-full" id="title" type="text" name="title" placeholder="Recent Sports news" value="{{$blog->title}}">
                    @error('title')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="subtitle"> Sub Title
                    <input class="form-input rounded w-full" id="subtitle" type="text" name="subtitle" placeholder="Recent Sports news subtitle" value="{{$blog->sub_title}}">
                    @error('subtitle')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="content_type"> Content Type <span class="text-rose-500">*</span>
                    <select class="block rounded form-select w-full" id="content_type" name="content_type">
                        <option value="1" {{$blog->content_type == 1 ? 'selected':''}}>Default</option>
                        <option value="2" {{$blog->content_type == 2 ? 'selected':''}}>List</option>
                    </select>
                    @error('content_type')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="template"> Template <span class="text-rose-500">*</span>
                    <select class="block rounded form-select w-full" id="template" name="template">
                        <option value="1" {{$blog->template == 1 ? 'selected':''}}>Default</option>
                        <option value="2" {{$blog->template == 2 ? 'selected':''}}>List</option>
                    </select>
                    @error('template')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="is_featured"> Is Featured <span class="text-rose-500">*</span>
                    <select class="block rounded form-select w-full" id="is_featured" name="is_featured">
                        <option value="0" {{$blog->is_featured ? '':'selected'}}>No</option>
                        <option value="1" {{$blog->is_featured ? 'selected':''}}>Yes</option>
                    </select>
                    @error('is_featured')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="status"> Status <span class="text-rose-500">*</span>
                    <select class="block rounded form-select w-full" id="status" name="status">
                        <option value="1" {{$blog->status ? 'selected':''}}>Active</option>
                        <option value="0" {{$blog->status ? '':'selected'}}>Inactive</option>
                    </select>
                    @error('status')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="blog_img"> Image <span class="text-rose-500">*</span>
                    <input type="hidden" name="image_path" value="{{$blog->image}}">
                    <input type="hidden" name="image_path_small" value="{{$blog->small_img}}">
                    <input class="form-input rounded w-full" id="blog_img" type="file" name="blog_img" accept="image/*">
                    @error('blog_img')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="tags"> Tags <span class="text-rose-500">*</span>
                    <select class="block rounded w-full max-h-14" id="tags" name="tags[]" multiple>
                        <option value="" selected disabled>Select Tags</option>
                        @foreach($tags as $key => $tag)
                            <option value="{{$tag->id}}" {{in_array($tag->id, $blog->tag_ids)? 'selected':''}}>
                                {{$tag->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('permissions')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block"> Read Time
                    <div class="flex gap-x-2">
                        <input class="w-24 rounded" id="hours" name="hours" type="number" placeholder="Hour" value="{{$blog->hour}}">
                        <input class="w-24 rounded" id="minutes" name="minutes" type="number" placeholder="Minute" value="{{$blog->minute}}">
                        <input class="w-24 rounded" id="seconds" name="seconds" type="number" placeholder="Second" value="{{$blog->second}}">
                    </div>
                </label>
            </div>

            <div class="mt-3">
                <label for="editorjs"> Content
                    <textarea id="editorjs" name="content">{{$blog->content}}</textarea>
                    @error('content')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <div class="flex items-end justify-end gap-x-2 mt-3">
                    <a href="{{route('blogs.index')}}" class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Back</a>
                    <button class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Update</button>
                </div>
            </div>
        </div>
    </form>
    @push('admin_script')
        <script>
            const editor2 = new RichTextEditor("#editorjs", { skin: "rounded-corner", toolbar: "basic" });
        </script>
    @endpush
@endsection
