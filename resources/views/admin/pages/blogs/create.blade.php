@extends('admin.layout.admin')
@section('admin_title', 'Dashboard')
@section('admin_pages')
<form action="{{route('blogs.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="p-4 rounded-xl shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)]">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <label class="block" for="title"> Title <span class="text-rose-500">*</span>
                <input class="form-input rounded w-full" id="title" type="text" name="title" placeholder="Recent Sports news" value="{{old('title')}}">
                @error('title')
                    <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label class="block" for="subtitle"> Sub Title
                <input class="form-input rounded w-full" id="subtitle" type="text" name="subtitle" placeholder="Recent Sports news subtitle" value="{{old('subtitle')}}">
                @error('subtitle')
                    <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label class="block" for="content_type"> Content Type <span class="text-rose-500">*</span>
                <select class="block rounded form-select w-full" id="content_type" name="content_type">
                    <option value="0">Default</option>
                    <option value="1">List</option>
                </select>
                @error('content_type')
                    <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label class="block" for="template"> Template <span class="text-rose-500">*</span>
                <select class="block rounded form-select w-full" id="template" name="template">
                    <option value="0">Default</option>
                    <option value="1">List</option>
                </select>
                @error('template')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label class="block" for="is_featured"> Is Featured <span class="text-rose-500">*</span>
                <select class="block rounded form-select w-full" id="is_featured" name="is_featured">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
                @error('is_featured')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label class="block" for="status"> Status <span class="text-rose-500">*</span>
                <select class="block rounded form-select w-full" id="status" name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                @error('status')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label class="block" for="tag_img"> Image <span class="text-rose-500">*</span>
                <input class="form-input rounded w-full" id="tag_img" type="file" name="tag_img" accept="image/*">
                @error('tag_img')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label class="block" for="tags"> Tags <span class="text-rose-500">*</span>
                <select class="block rounded w-full max-h-14" id="tags" name="tags[]" multiple>
                    <option value="" selected disabled>Select Tags</option>
                    @foreach($tags as $key => $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
                @error('permissions')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label for="editorjs"> Content
                <textarea id="editorjs" name="content"></textarea>
                @error('content')
                    <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <div class="flex items-end justify-end gap-x-2">
                <a href="{{route('tags.index')}}" class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Back</a>
                <button class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Create</button>
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
