<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        // dump and die
        // dd($posts);
        return view('pages.index', compact('posts'));
    }

    public function create() {
        return view('pages.create');
    }

    public function store(Request $request) {
        // dd($request->all());
        // validation shalgalt hiine (ugugdliig shalgana)

        $validateData = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'status' => 'nullable|sometimes'
        ]);

        // dd($validateData);

        Post::query()->create([
            'title' => $validateData['title'],
            'description' => $validateData['description'],
            'status' => $request->status == true ? 1 : 0
        ]);

        return redirect('/posts') -> with('message', 'Post Created Successfully');
    }

    public function edit($id) {
        $post = Post::query()->find($id);
        return view('pages.edit', compact('post'));
    }

    public function update(Request $request, $id) {
        // dd($request->all());
        // validation shalgalt hiine (ugugdliig shalgana)

        $validateData = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'status' => 'nullable|sometimes'
        ]);

        $post = Post::query()->find($id);

        // dd($validateData);

        $post->update([
            'title' => $validateData['title'],
            'description' => $validateData['description'],
            'status' => $request->status == true ? 1 : 0
        ]);

        return redirect('/posts') -> with('message', 'Post Updated Successfully');
    }

    

    public function destroy($id) {
        // dd($request->all());
        // validation shalgalt hiine (ugugdliig shalgana)

        $post = Post::query()->find($id);

        // dd($validateData);

        $post->delete();

        return redirect('/posts') -> with('message', 'Post Deleted Successfully');
    }
}
