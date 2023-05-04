<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return Post::latest()->get();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'link' => 'required|string',
            'image' => 'required|string'
        ]);
        
        if (Post::create($data))
            return "Post Created Successfully!";
        else return "Something went wrong!";
    }

    public function update($id, Request $request) {
        $post = Post::findOrFail($id);
        $data = $request->all();

        if ($post->update($data))
            return "Post Updated Successfully!";
        else return "Something went wrong!";
    }

    public function delete($id) {
        $post = Post::findOrFail($id);
        if ($post->delete())
            return "Post Deleted Successfully!";
        else return "Something went wrong!";
    }
}
