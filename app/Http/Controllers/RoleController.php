<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.roles.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.roles.create');
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
                'status' => 'required',
            ], [
                'name.required' => 'Role name is required.',
                'status.required' => 'Status is required.'
            ]);

            $role = new Role();
            $role->name = $request->name;
            $role->details = $request->details;
            $role->status = $request->status;
            $role->created_by = $request->user()->id;
            $role->updated_by = $request->user()->id;
            $role->save();

            return redirect()->route('roles.index')->with('success', 'Role created.');
        } catch (\Exception $e) {
//            dd($e->getMessage(),$e->getFile(), $e->getLine());
            return redirect()->route('roles.index')->with('error', 'Role action failed [R-001]');
        }
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
        $decodedId = Crypt::decryptString($id);
        $role = Role::find($decodedId);
        return view('admin.pages.roles.edit', compact('role'));
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
        try {
            $decodedId = Crypt::decryptString($id);

            $request->validate([
                'name' => 'required',
                'status' => 'required',
            ], [
                'name.required' => 'Role name is required.',
                'status.required' => 'Status is required.'
            ]);

            $role = Role::find($decodedId);
            $role->name = $request->name;
            $role->details = $request->details;
            $role->status = $request->status;
            $role->updated_by = $request->user()->id;
            $role->save();

            return redirect()->route('roles.index')->with('success', 'Role Updated.');
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('error', 'Role action failed [R-002]');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $decodedId = Crypt::decryptString($id);
            Role::find($decodedId)->delete();

            return redirect()->route('roles.index')->with('success', 'Role Deleted.');
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('error', 'Role action failed [R-003]');
        }
    }

    public function List() {
        $users = Role::orderByDesc('id')->get();
        return DataTables::of($users)
            ->addColumn('action', function($row){
                $btn = '
                <a href="'."/roles/".Crypt::encryptString($row->id)."/edit".'" class="edit-btn">Edit</a>
                <form style="display: inline-block" action="'."/roles/".Crypt::encryptString($row->id).'" method="POST">
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
