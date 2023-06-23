<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\SeriesContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class SeriesContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.seriesContents.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogs = Blog::where(['status' => 1, 'content_type' => 2])->get();
        return view('admin.pages.seriesContents.create', ['blogs' => $blogs]);
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
                'title' => 'required',
                'blog_id' => 'required',
                'content' => 'required',
                'status' => 'required',
            ], [
                'title.required' => 'Series title is required.',
                'blog_id.required' => 'Blog is required.',
                'content.required' => 'Content is required.',
                'status.required' => 'Status is required.',
            ]);

            $seriesContent = new SeriesContent();
            $seriesContent->title = $request->title;
            $seriesContent->blog_id = $request->blog_id;
            $seriesContent->content = $request->get('content');
            $seriesContent->status = $request->status;
            $seriesContent->created_by = $request->user()->id;
            $seriesContent->updated_by = $request->user()->id;
            $seriesContent->save();

            return redirect()->route('series-content.index')->with('success', 'Series content created.');
        } catch (\Exception $e) {
            return redirect()->route('series-content.index')->with('error', 'Series action failed [SC-001]');
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
        $decryptId = Crypt::decryptString($id);
        $seriesContent = SeriesContent::find($decryptId);
        $blogs = Blog::where(['status' => 1, 'content_type' => 2])->get();
        return view('admin.pages.seriesContents.edit', compact('seriesContent', 'blogs'));
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
                'title' => 'required',
                'blog_id' => 'required',
                'content' => 'required',
                'status' => 'required',
            ], [
                'title.required' => 'Series title is required.',
                'blog_id.required' => 'Blog is required.',
                'content.required' => 'Content is required.',
                'status.required' => 'Status is required.',
            ]);

            $seriesContent = SeriesContent::find($decodedId);
            $seriesContent->title = $request->title;
            $seriesContent->blog_id = $request->blog_id;
            $seriesContent->content = $request->get('content');
            $seriesContent->status = $request->status;
            $seriesContent->updated_by = $request->user()->id;
            $seriesContent->save();

            return redirect()->route('series-content.index')->with('success', 'Series content Updated.');
        } catch (\Exception $e) {
            return redirect()->route('series-content.index')->with('error', 'Series action failed [SC-002]');
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
        //
    }

    public function List() {
        $seriesContent = SeriesContent::leftJoin('blogs', 'series_contents.blog_id', '=', 'blogs.id')
            ->get([
                'series_contents.*',
                'blogs.title as blog_title'
            ]);

        return DataTables::of($seriesContent)
            ->addColumn('action', function($row){
                $btn = '
                <a href="'."/series-content/".Crypt::encryptString($row->id)."/edit".'" class="edit-btn">Edit</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
