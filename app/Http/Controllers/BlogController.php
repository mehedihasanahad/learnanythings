<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.blogs.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::where('status', 1)->get([
            'id',
            'name'
        ]);
        return view('admin.pages.blogs.create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content_type' => 'required',
            'template' => 'required',
            'is_featured' => 'required',
            'blog_img' => 'required',
            'status' => 'required',
            'tags' => 'required|array',
        ], [
            'title.required' => 'Blog title is required.',
            'content_type.required' => 'Content type is required.',
            'template.required' => 'Template is required.',
            'status.required' => 'Status is required.',
            'tags.required' => 'Tags is required.',
            'tags.array' => 'Tags must be array type.',
            'blog_img.required' => 'Blog image is required.'
        ]);

        $bigImg = resizeImageAndMoveToDirectories($request->file('blog_img'), 'uploads/blogs', 1200, 807, 'LEARN-');
        $smallImg = resizeImageAndMoveToDirectories($request->file('blog_img'), 'uploads/blogs', 600, 403, 'LEARN-');

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->sub_title = $request->title;
        $blog->content_type = $request->content_type;
        $blog->template = $request->template;
        $blog->is_featured = $request->is_featured;
        $blog->image = ($bigImg['status'] === 200) ? $bigImg['imagePath'] : null;
        $blog->small_img = ($smallImg['status'] === 200) ? $smallImg['imagePath'] : null;
        $blog->status = $request->status;
        $blog->hour = $request->hours;
        $blog->minute = $request->minutes;
        $blog->second = $request->seconds;
        $blog->tag_ids = $request->tags;
        $blog->content = $request->get('content');
        $blog->created_by = $request->user()->id;
        $blog->updated_by = $request->user()->id;
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog Created.');
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
        $decryptId = Crypt::decryptString($id);
        $blog = Blog::find($decryptId);
        $tags = Tag::where('status', 1)->get();
        return view('admin.pages.blogs.edit', compact('blog', 'tags'));
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
        $decodedId = Crypt::decryptString($id);

        $request->validate([
            'title' => 'required',
            'content_type' => 'required',
            'template' => 'required',
            'is_featured' => 'required',
            'status' => 'required',
            'tags' => 'required|array',
        ], [
            'title.required' => 'Blog title is required.',
            'content_type.required' => 'Content type is required.',
            'template.required' => 'Template is required.',
            'status.required' => 'Status is required.',
            'tags.required' => 'Tags is required.',
            'tags.array' => 'Tags must be array type.',
            'blog_img.required' => 'Blog image is required.'
        ]);


        $blog = Blog::find($decodedId);
        $blog->title = $request->title;
        $blog->sub_title = $request->title;
        $blog->content_type = $request->content_type;
        $blog->template = $request->template;
        $blog->is_featured = $request->is_featured;
        if ($request->file('blog_img')) {
            $bigImg = resizeImageAndMoveToDirectories($request->file('blog_img'), 'uploads/blogs', 1200, 807, 'LEARN-');
            $smallImg = resizeImageAndMoveToDirectories($request->file('blog_img'), 'uploads/blogs', 600, 403, 'LEARN-');

            $blog->image = ($bigImg['status'] === 200) ? $bigImg['imagePath'] : null;
            $blog->small_img = ($smallImg['status'] === 200) ? $smallImg['imagePath'] : null;
        } else {
            $blog->image = $request->image_path;
            $blog->small_img = $request->image_path_small;
        }
        $blog->status = $request->status;
        $blog->hour = $request->hours;
        $blog->minute = $request->minutes;
        $blog->second = $request->seconds;
        $blog->tag_ids = $request->tags;
        $blog->content = $request->get('content');
        $blog->updated_by = $request->user()->id;
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog Updated.');
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

    public function List()
    {
        $blogs = Blog::orderByDesc('id')->get();
        return DataTables::of($blogs)
            ->addColumn('image', function($row) {
                return '<img src="'.$row->small_img.'" style="width: 60px; height: 60px; object-fit:cover">';
            })
            ->addColumn('action', function ($row) {
                return '<a  href="' . "/blogs/" . Crypt::encryptString($row->id) . "/edit" . '" class="edit-btn">Edit</a>';
            })
            ->rawColumns(['action', 'image', 'markerColor'])
            ->addIndexColumn()
            ->make(true);
    }
}
