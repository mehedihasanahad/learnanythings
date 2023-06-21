@extends('admin.layout.admin')
@section('admin_title', 'Dashboard')
@section('admin_pages')
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="p-4 rounded-xl shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <label class="block" for="name"> Name <span class="text-rose-500">*</span>
                    <input class="form-input rounded w-full" id="name" type="text" name="name" placeholder="Amir" value="{{old('name')}}">
                    @error('name')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="email"> Email <span class="text-rose-500">*</span>
                    <input class="form-input rounded w-full" id="email" type="text" name="email" placeholder="example@gmail.com" value="{{old('email')}}">
                    @error('email')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="password"> Password <span class="text-rose-500">*</span>
                    <input class="form-input rounded w-full" id="password" type="text" name="password" placeholder="12345678" value="{{old('password')}}">
                    @error('password')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="role_id"> Role <span class="text-rose-500">*</span>
                    <select class="block rounded form-select w-full" id="role_id" name="roles[]">
                        <option value="" selected disabled>Select Role</option>
                        @foreach($roles as $key => $role)
                            <option value="{{$key}}">{{$role}}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="status"> User Status <span class="text-rose-500">*</span>
                    <select class="block rounded form-select w-full" id="status" name="block_status">
                        <option value="0">Active</option>
                        <option value="1">Block</option>
                    </select>
                    @error('block_status')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <div class="flex items-end justify-end gap-x-2">
                    <a href="{{route('users.index')}}" class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Back</a>
                    <button class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Create</button>
                </div>
            </div>
        </div>
    </form>
@endsection
