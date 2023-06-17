@extends('admin.layout.admin')
@section('admin_title', 'Dashboard')
@section('admin_pages')
    <form action="{{route('users.update', Crypt::encryptString($user->id))}}" method="POST">
        @csrf
        @method('PUT')
        <div class="p-4 rounded-xl shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <label class="block" for="name"> Name <span class="text-rose-500">*</span>
                    <input class="form-input rounded w-full" id="name" type="text" name="name" placeholder="Amir" value="{{$user->name}}">
                    @error('name')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="role_id"> Role <span class="text-rose-500">*</span>
                    <select class="block rounded form-select w-full" id="role_id" name="role_id">
                        <option value="" selected disabled>Select Role</option>
                        @foreach($roles as $key => $role)
                            <option value="{{$role->id}}" {{($user->role_id == $role->id) ?'selected':''}}>{{$role->name}}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block" for="status"> User Status <span class="text-rose-500">*</span>
                    <select class="block rounded form-select w-full" id="status" name="block_status">
                        <option value="0" {{$user->is_blocked?'':'selected'}}>Active</option>
                        <option value="1" {{$user->is_blocked?'selected':''}}>Block</option>
                    </select>
                    @error('block_status')
                    <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <div class="flex items-end justify-end gap-x-2">
                    <a href="{{route('users.index')}}" class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Back</a>
                    <button class="p-2 rounded bg-slate-300 text-bg-slate-800 active:bg-slate-400 active:text-white">Update</button>
                </div>
            </div>
        </div>
    </form>
@endsection
