<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            'status' => 'nullable|sometimes',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048' //2mb
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file -> getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $file->move('uploads/postsImage/', $filename);

            $validateData['image'] = 'uploads/postsImage/'. $filename;
        } else {
            $validateData['image'] = null;
        }

        // dd($validateData);

        Post::query()->create([
            'title' => $validateData['title'],
            'description' => $validateData['description'],
            'status' => $request->status == true ? 1 : 0,
            'image' => $validateData['image'],
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
            'status' => 'nullable|sometimes',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        $post = Post::query()->find($id);
        
        if($request->hasFile('image')) {
            $destination = $post -> image;

            if(File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file -> getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $file->move('uploads/postsImage/', $filename);

            $validateData['image'] = 'uploads/postsImage/'. $filename;
        } else {
            $validateData['image'] = null;
        }
        // dd($validateData);

        $post->update([
            'title' => $validateData['title'],
            'description' => $validateData['description'],
            'status' => $request->status == true ? 1 : 0,
            'image' => $validateData['image'],
        ]);

        return redirect('/posts') -> with('message', 'Post Updated Successfully');
    }

    






    public function destroy(Request $request, $id) {
        // dd($request->all());
        // validation shalgalt hiine (ugugdliig shalgana)

        $post = Post::query()->find($id);

        $destination = $post -> image;

        if(File::exists($destination)) {
            File::delete($destination);
        }
        

        // dd($validateData);

        $post->delete();

        return redirect('/posts') -> with('message', 'Post Deleted Successfully');
    }








    public function search(Request $request) {
        $query = $request->get('query');

        $results = Post::query()->where('title', 'like', '%' . $query . '%')
        ->orWhere('description', 'like', '%' . $query . '%')
        ->get();
        

        return view('pages.search', compact('results', 'query'));
    }
}
