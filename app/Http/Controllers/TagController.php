<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.tags.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//       try {
           $request->validate([
               'name' => 'required',
               'bullet_color' => 'required',
               'is_featured' => 'required',
               'tag_img' => 'required|mimes:png,jpg,jpeg,webp',
               'status' => 'required',
           ], [
               'name.required' => 'Tag name is required',
               'role_id.required' => 'Tag marker color is required',
               'is_featured.required' => 'Featured status is required',
               'tag_img.required' => 'Tag image is required',
               'tag_img.mimes' => 'Image must be in JPG, PNG, JPEG OR WEBP format',
           ]);

           $bigImg = resizeImageAndMoveToDirectories($request->file('tag_img'), 'uploads/tags', 1200, 807, 'LEARN-');
           $midImg = resizeImageAndMoveToDirectories($request->file('tag_img'), 'uploads/tags', 600, 403, 'LEARN-');

           $tag = new Tag();
           $tag->name = $request->name;
           $tag->details = $request->description;
           $tag->bullet_color = $request->bullet_color;
           $tag->image = ($bigImg['status'] === 200) ? $bigImg['imagePath'] : null;
           $tag->small_img = ($midImg['status'] === 200) ? $midImg['imagePath'] : null;
           $tag->is_featured = $request->is_featured;
           $tag->status = $request->status;
           $tag->created_by = auth()->user()->id;
           $tag->updated_by = auth()->user()->id;
           $tag->save();

           return redirect()->route('tags.index')->with('success', 'Tag Created.');
//       } catch (\Exception $e) {
//           dd($e->getMessage(),$e->getFile(), $e->getLine());
//           return redirect()->route('tags.index')->with('error', 'Tag action failed [T-001]');
//       }
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
        //
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
        //
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
        $permissions = Permission::leftJoin('roles', 'permissions.role_id', '=', 'roles.id')
            ->orderByDesc('id')
            ->get([
                'permissions.*',
                'roles.name as role_name'
            ]);

        return DataTables::of($permissions)
            ->addColumn('action', function($row){
                $btn = '
                <a href="'."/permissions/".$row->id."/edit".'" class="edit-btn">Edit</a>
                <form style="display: inline-block" action="'."/permissions/".$row->id.'" method="POST">
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
