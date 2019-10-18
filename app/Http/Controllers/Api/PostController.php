<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Post::where('user_id', auth()->id())->get();
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->texto = $request->texto;
        $post->user_id = auth()->id();
        $post->save();

        return $post;
    }

    public function update(Request $request, $id)
    {
        $post = post::find($id);
        $post->texto = $request->texto;
        $post->save();

        return $post;
    }

    public function destroy($id)
    {
        $post = post::find($id);
        $post->delete();
    }
}
