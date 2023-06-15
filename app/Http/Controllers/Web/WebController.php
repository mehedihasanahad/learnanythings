<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Facades\Crypt;

class WebController extends Controller
{
    public function index() {
        $tags = Tag::where('status', 1)->get();
        return view('pages.hero', ['tags' => $tags]);
    }

    public function individualTag($id) {
        $decryptId = Crypt::decryptString($id);
        $tagDetails = Tag::where([
            'id' => $decryptId,
            'status' => 1
        ])->first();
        if ($tagDetails) {
            return view('pages.tag', compact('tagDetails'));
        } else {
            abort(404);
        }
    }
}
