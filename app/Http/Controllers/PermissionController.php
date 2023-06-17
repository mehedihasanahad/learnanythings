<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.permissions.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where(['status' => 1])->get();
        return view('admin.pages.permissions.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'table_name' => 'required',
                'permissions' => 'required',
                'status' => 'required',
                'role_id' => 'required',
            ], [
                'name.required' => 'Permission name is required.',
                'table_name.required' => 'Table name is required.',
                'permissions.required' => 'Permissions is required.',
                'status.required' => 'Status is required.',
                'role_id.required' => 'Role is required.'
            ]);

            $permission = new Permission();
            $permission->name = $request->name;
            $permission->role_id = $request->role_id;
            $permission->permission_lists = json_encode($request->permissions);
            $permission->table_name = $request->table_name;
            $permission->status = $request->status;
            $permission->created_by = $request->user()->id;
            $permission->updated_by = $request->user()->id;
            $permission->save();

            return redirect()->route('permissions.index')->with('success', 'Permission created.');
        } catch (\Exception $e) {
            return redirect()->route('permissions.index')->with('error', 'Permission action failed [P-001]');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permision
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permision
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $decodedId = Crypt::decryptString($id);
        $roles = Role::where(['status' => 1])->get();
        $permision = Permission::find($decodedId);
        $permision_list = json_decode($permision->permission_lists, true);

        return view('admin.pages.permissions.edit', ['roles' => $roles, 'permission' => $permision, 'permission_list' => $permision_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $decodedId = Crypt::decryptString($id);

            $request->validate([
                'name' => 'required',
                'table_name' => 'required',
                'permissions' => 'required',
                'status' => 'required',
                'role_id' => 'required',
            ], [
                'name.required' => 'Permission name is required.',
                'table_name.required' => 'Table name is required.',
                'permissions.required' => 'Permissions is required.',
                'status.required' => 'Status is required.',
                'role_id.required' => 'Role is required.'
            ]);

            $permission = Permission::find($decodedId);
            $permission->name = $request->name;
            $permission->role_id = $request->role_id;
            $permission->permission_lists = json_encode($request->permissions);
            $permission->table_name = $request->table_name;
            $permission->status = $request->status;
            $permission->updated_by = $request->user()->id;
            $permission->save();

            return redirect()->route('permissions.index')->with('success', 'Permission Updated.');
        } catch (\Exception $e) {
            return redirect()->route('permissions.index')->with('error', 'Permission action failed [P-002]');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permision
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $decodedId = Crypt::decryptString($id);
            Permission::find($decodedId)->delete();

            return redirect()->route('permissions.index')->with('success', 'Permission Deleted.');
        } catch (\Exception $e) {
            return redirect()->route('permissions.index')->with('error', 'Permission action failed [P-003]');
        }
    }

    public function List() {
        $permissions = Permission::leftJoin('roles', 'permissions.role_id', '=', 'roles.id')
            ->orderByDesc('id')
            ->get([
                'permissions.*',
                'roles.name as role_name'
            ]);

        return DataTables::of($permissions)
            ->addColumn('action', function($row){
                $btn = '
                <a href="'."/permissions/".Crypt::encryptString($row->id)."/edit".'" class="edit-btn">Edit</a>
                <form style="display: inline-block" action="'."/permissions/".Crypt::encryptString($row->id).'" method="POST">
                <input type="hidden" name="_token" value="'.csrf_token().'"/>
                <input type="hidden" name="_method" value="DELETE"/>
                <button class="delete-btn">Delete</button>
                </form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
