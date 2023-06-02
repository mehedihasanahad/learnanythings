@extends('admin.layout.admin')
@section('admin_title', 'Dashboard')
@section('admin_pages')
    <form action="{{route('roles.update', $role->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="p-4 rounded-xl shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <label class="block" for="name"> Role Name <span class="text-rose-500">*</span>
                    <input class="form-input rounded w-full" value="{{$role->name}}" id="name" type="text" name="name" placeholder="Writer">
                    @error('name')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>
                <label class="block" for="details"> About Role
                    <input class="form-input rounded w-full" value="{{$role->details}}" id="details" type="text" name="details" placeholder="Only can write blog using this role.">
                </label>
                <label class="block" for="status"> Role Status <span class="text-rose-500">*</span>
                    <select class="block rounded form-select w-full" id="status" name="status">
                        <option value="0" {{$role->status?'':'selected'}}>Inactive</option>
                        <option value="1" {{$role->status?'selected':''}}>Active</option>
                    </select>
                    @error('status')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>
                <div class="flex items-end justify-end gap-x-2">
                    <a href="{{route('roles.index')}}" class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Back</a>
                    <button class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Update</button>
                </div>
            </div>
        </div>
    </form>
@endsection
