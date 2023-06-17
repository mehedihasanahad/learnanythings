<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class WebController extends Controller
{
    public function index() {
        $paginateFirst = config('app.app_settings.paginateFirst');
        $tags = Tag::where('status', 1)->get(['id', 'small_img', 'name', 'bullet_color']);
        $latestblogs = Blog::where(['status' => 1,])->orderByDesc('id')->take(3)->get();
        $blogs = Blog::where(['status' => 1,])->select(['id', 'title', 'sub_title','tag_ids', 'small_img'])->inRandomOrder()->paginate($paginateFirst);
        $featuredBlogs = Blog::where(['status' => 1, 'is_featured' => 1])->orderByDesc('id')->take(4)->get(['id', 'title', 'small_img']);
        return view('pages.hero', compact('tags', 'latestblogs', 'featuredBlogs', 'blogs'));
    }

    public function individualTag($id) {
        $paginateFirst = config('app.app_settings.paginateFirst');
        $decryptId = Crypt::decryptString($id);
        $tagDetails = Tag::where([
            'id' => $decryptId,
            'status' => 1
        ])->first();

        $blogs = Blog::where([['status', 1], ['tag_ids', 'like', "%$decryptId%"]])
            ->select(['id', 'title', 'sub_title','tag_ids', 'small_img'])
            ->paginate($paginateFirst);

        $totalBlog = Blog::where([['status', 1], ['tag_ids', 'like', "%$decryptId%"]])->count();

        if ($tagDetails) return view('pages.tag', compact('tagDetails', 'blogs', 'totalBlog'));
        else abort(404);
    }

    public function individualBlog($id) {
        $decryptId = Crypt::decryptString($id);
        $blog = Blog::where([
            'id' => $decryptId,
            'status' => 1
        ])->first();
        $featuredBlogs = Blog::where(['status' => 1, 'is_featured' => 1])->orderByDesc('id')->take(4)->get(['id', 'title', 'small_img']);
        $latestblogs = Blog::where(['status' => 1,])->orderByDesc('id')->take(3)->get();
        if ($blog) return view('pages.details', compact('blog', 'featuredBlogs', 'latestblogs'));
        else abort(404);
    }

    public function getBlogs() {
        $blogs = Blog::where(['status' => 1,])
            ->select(['id', 'title', 'sub_title','tag_ids', 'small_img'])->paginate(3);
        $blogs->makeHidden(['boolstatus', 'featured', 'contenttype', 'template']);

        return response()->json([
            'blogs' => $blogs,
            'status' => 200,
            'message' => 'success'
        ]);
    }

    public function encrptJsVariable($id) {
        return response()->json([
            'encryptedId' => Crypt::encryptString($id),
            'status' => 200,
            'message' => 'success'
        ]);
    }

    public function getTags() {
        $tags = Tag::where('status', 1)->get();

        return response()->json([
            'tags' => $tags,
            'status' => 200,
            'message' => 'success'
        ]);
    }

    public function individualTagDataBlogs($id) {
        $decryptId = Crypt::decryptString($id);
        $blogs = Blog::where([['status', 1], ['tag_ids', 'like', "%$decryptId%"]])
            ->select(['id', 'title', 'sub_title','tag_ids', 'small_img'])
            ->paginate(3);
        $blogs->makeHidden(['boolstatus', 'featured', 'contenttype', 'template']);

        return response()->json([
            'blogs' => $blogs,
            'status' => 200,
            'message' => 'success'
        ]);
    }
}
