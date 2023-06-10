@extends('admin.layout.admin')
@section('admin_title', 'Dashboard')
@section('admin_pages')
<form action="{{route('tags.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="p-4 rounded-xl shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)]">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <label class="block" for="name"> Name <span class="text-rose-500">*</span>
                <input class="form-input rounded w-full" id="name" type="text" name="name" placeholder="Sports" value="{{old('name')}}">
                @error('name')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label class="block" for="description"> Description
                <input class="form-input rounded w-full" id="description" type="text" name="description" value="{{old('description')}}" placeholder="The most popular topic in the world">
                @error('description')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label class="block" for="bullet_color"> Marker color <span class="text-rose-500">*</span>
                <input class="form-input rounded w-full h-11" id="bullet_color" type="color" name="bullet_color" value="{{old('bullet_color')}}">
                @error('bullet_color')
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
        </div>

        <div class="flex items-end justify-end gap-x-2 mt-3">
            <a href="{{route('tags.index')}}" class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Back</a>
            <button class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Create</button>
        </div>
    </div>
</form>
@endsection
