<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Support\Facades\Crypt;

class WebController extends Controller
{
    public function index() {
        $tags = Tag::where('status', 1)->get(['id', 'small_img', 'name', 'bullet_color']);
        $latestblogs = Blog::where(['status' => 1,])->orderByDesc('id')->limit(3)->get();
        $blogs = Blog::where(['status' => 1,])->select(['id', 'title', 'sub_title','tag_ids', 'small_img'])->paginate(6);
        $featuredBlogs = Blog::where(['status' => 1, 'is_featured' => 1])->orderByDesc('id')->limit(4)->get(['id', 'title', 'small_img']);
        return view('pages.hero', compact('tags', 'latestblogs', 'featuredBlogs', 'blogs'));
    }

    public function individualTag($id) {
        $decryptId = Crypt::decryptString($id);
        $tagDetails = Tag::where([
            'id' => $decryptId,
            'status' => 1
        ])->first();

        $blogs = Blog::where([['status', 1], ['tag_ids', 'like', "%$decryptId%"]])
            ->select(['id', 'title', 'sub_title','tag_ids', 'small_img'])
            ->paginate(6);

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
        $featuredBlogs = Blog::where(['status' => 1, 'is_featured' => 1])->orderByDesc('id')->limit(4)->get(['id', 'title', 'small_img']);
        $latestblogs = Blog::where(['status' => 1,])->orderByDesc('id')->limit(3)->get();
        if ($blog) return view('pages.details', compact('blog', 'featuredBlogs', 'latestblogs'));
        else abort(404);
    }
}
