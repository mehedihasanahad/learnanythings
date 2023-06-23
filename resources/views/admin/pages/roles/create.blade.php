@extends('admin.layout.admin')
@section('admin_title', 'Dashboard')
@section('admin_pages')
<form action="{{route('roles.store')}}" method="POST">
    @csrf
    <div class="p-4 rounded-xl shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)]">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <label class="block" for="name"> Role Name <span class="text-rose-500">*</span>
                <input class="form-input rounded w-full" id="name" type="text" name="name" placeholder="Writer">
                @error('name')
                    <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label class="block" for="permissions"> Permissions <span class="text-rose-500">*</span>
                <select class="block rounded w-full" id="permissions" name="permissions[]" multiple>
                    <option value="" selected disabled>Select Permissions</option>
                    @foreach($permissions as $key => $permission)
                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                    @endforeach
                </select>
                @error('permissions')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>
{{--            <label class="block" for="details"> About Role--}}
{{--                <input class="form-input rounded w-full" id="details" type="text" name="details" placeholder="Only can write blog using this role.">--}}
{{--            </label>--}}
{{--            <label class="block" for="status"> Role Status <span class="text-rose-500">*</span>--}}
{{--                <select class="block rounded form-select w-full" id="status" name="status">--}}
{{--                    <option value="0">Inactive</option>--}}
{{--                    <option value="1">Active</option>--}}
{{--                </select>--}}
{{--                @error('status')--}}
{{--                <p class="text-red-700">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--            </label>--}}
            <div class="flex items-end justify-end gap-x-2">
                <a href="{{route('roles.index')}}" class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Back</a>
                <button class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Create</button>
            </div>
        </div>
    </div>
</form>
@endsection
