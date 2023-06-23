<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Permission\Models\Role;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.users.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $roles = Role::get();
        $roles = Role::pluck('name','name')->all();
        return view('admin.pages.users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:8',
                'roles' => 'required',
                'block_status' => 'required',
            ], [
                'name.required' => 'User name is required',
                'roles.required' => 'User role is required',
            ]);
        $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
//            $user->roles = json_encode($request->roles);
            $user->is_blocked = $request->block_status;
            $user->password = Hash::make($request->password);
            $user->created_by = Auth::user()->id;
            $user->updated_by = Auth::user()->id;
            $user->save();
            $user->assignRole($request->input('roles'));

            return redirect()->route('users.index')->with('success', 'User created.');
//        } catch (\Exception $e) {
//            dd($e->getMessage(),$e->getFile(), $e->getLine());
//            return redirect()->route('users.index')->with('error', 'User action failed [U-001]');
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $decodeId = Crypt::decryptString($id);
        $user = User::find($decodeId);
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('admin.pages.users.edit', ['userRoles' => $userRoles, 'user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        try {
            $decodeId = Crypt::decryptString($id);

            $request->validate([
                'name' => 'required',
                'roles' => 'required',
                'block_status' => 'required',
            ], [
                'name.required' => 'User name is required',
                'roles.required' => 'User role is required',
            ]);

            $user = User::find($decodeId);
            $user->name = $request->name;
//            $user->roles = json_encode($request->roles);
            $user->is_blocked = $request->block_status;
            $user->updated_by = Auth::user()->id;
            $user->save();

            DB::table('model_has_roles')->where('model_id',$decodeId)->delete();
            $user->assignRole($request->input('roles'));

            return redirect()->route('users.index')->with('success', 'User Updated.');
//        } catch (\Exception $e) {
//            return redirect()->route('permissions.index')->with('error', 'User action failed [U-002]');
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function List() {
        $users = User::orderByDesc('id')->get();
        return DataTables::of($users)
            ->addColumn('action', function($row){
                $btn = '
                <a  href="'."/users/".Crypt::encryptString($row->id)."/edit".'" class="edit-btn">Edit</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
