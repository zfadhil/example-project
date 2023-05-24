<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $post = Post::all();
        return view('posts.index' ,['data' => $post]);
        // return response()->json($post);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($validatedData);

        return redirect('/feeds')
        ->with('success', 'Post created successfully!');
    }

    public function update(PostRequest $request,$id){
        $post = Post::find($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);
        return redirect('/feeds');
    }

    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function delete($id){
        Post::find($id)->delete();
        return redirect('/feeds');
    }
}
