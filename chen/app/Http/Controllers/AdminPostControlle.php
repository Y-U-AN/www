<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostControlle extends Controller
{
    public function index()
    {
        return view('admin.posts.index',[
            'post'=>Post::paginate(50)
        ]);
    }
    
    public function create()
    {
        // if (auth()->guest()) {
        //     // abort(403);
        //     abort(Response::HTTP_FORBIDDEN);
        // }

        // if (auth()->user()?->username != 'ccmy'){
        //     abort(Response::HTTP_FORBIDDEN);
        // }

        return view('admin.posts.create');
    }

    public function store(Request $request)
    {

        
    //    if (request()->hasFile('thumbnail')) {
    //             $path = request()->file('thumbnail')->store('thumbnails', 'public');
    //             return 'Uploaded to: ' . $path;
    //         } else {
    //             return 'No thumbnail uploaded.';
    //         }


        //ddd(request()->all());

        $attributes = $request->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('index', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    
        $attributes['user_id'] = auth()->id();
        // $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails') ;
    
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $attributes['thumbnail'] = $path;
        }
    
        Post::create($attributes);
    
        return redirect('/');

    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post'=>$post]);
    }

    
    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        }
        
        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/admin/posts')->with('success', 'Post Deleted!');
    }


}


       