<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

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
        $roles = Role::where(['status' => 1])->get();
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
                'role_id' => 'required',
                'block_status' => 'required',
            ], [
                'name.required' => 'User name is required',
                'role_id.required' => 'User role is required',
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = 2; // normal admin = 2; system admin = 0;
            $user->role_id = $request->role_id;
            $user->is_blocked = $request->block_status;
            $user->password = Hash::make($request->password);
            $user->created_by = Auth::user()->id;
            $user->updated_by = Auth::user()->id;
            $user->save();

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
        $user = User::find($id);
        $roles = Role::where(['status' => 1])->get();
        return view('admin.pages.users.edit', ['roles' => $roles, 'user' => $user]);
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
            $request->validate([
                'name' => 'required',
                'role_id' => 'required',
                'block_status' => 'required',
            ], [
                'name.required' => 'User name is required',
                'role_id.required' => 'User role is required',
            ]);

            $user = User::find($id);
            $user->name = $request->name;
            $user->role_id = $request->role_id;
            $user->is_blocked = $request->block_status;
            $user->updated_by = Auth::user()->id;
            $user->save();

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
        $users = User::where([['role', '!=', 0]])->orderByDesc('id')->get();
        return DataTables::of($users)
            ->addColumn('action', function($row){
                $btn = '
                <a  href="'."/users/".$row->id."/edit".'" class="edit-btn">Edit</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
