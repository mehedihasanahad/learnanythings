@extends('admin.layout.admin')
@section('admin_title', 'Dashboard')
@section('admin_pages')
<form action="{{route('tags.store')}}" method="POST">
    @csrf
    <div class="p-4 rounded-xl shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)]">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <label class="block" for="role_id"> Role <span class="text-rose-500">*</span>
                <select class="block rounded form-select w-full" id="role_id" name="role_id">
                    <option value="" selected disabled>Select Role</option>
                    @foreach($roles as $key => $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
                @error('role_id')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label class="block" for="status"> Permission Status <span class="text-rose-500">*</span>
                <select class="block rounded form-select w-full" id="status" name="status">
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                </select>
                @error('status')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label class="block" for="name"> Permission Name <span class="text-rose-500">*</span>
                <input class="form-input rounded w-full" id="name" type="text" name="name" placeholder="Blog write permission">
                @error('name')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>

            <label class="block" for="table_name"> Table Name <span class="text-rose-500">*</span>
                <input class="form-input rounded w-full" id="table_name" type="text" name="table_name" placeholder="permissions">
                @error('table_name')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>
        </div>
        <div class="mt-2">
            <label class="block" for="permissions"> Permissions <span class="text-rose-500">*</span>
                <select class="block rounded w-full" id="permissions" name="permissions[]" multiple>
                    <option value="" selected disabled>Select Permissions</option>
                    <option value="view">View</option>
                    <option value="create">Create</option>
                    <option value="update">Update</option>
                    <option value="delete">Delete</option>
                </select>
                @error('permissions')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </label>
        </div>
{{--        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-2">--}}
        <div class="flex items-end justify-end gap-x-2 mt-2">
            <a href="{{route('permissions.index')}}" class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Back</a>
            <button class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Create</button>
        </div>
{{--        </div>--}}
    </div>
</form>
@endsection
