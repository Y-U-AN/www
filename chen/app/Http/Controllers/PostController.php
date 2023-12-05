<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
        public function index(Request $request)
    {
        $this->authorize('admin');

        return view('posts.index', [
            'posts' => Post::latest()->filter(
                $request->only(['search', 'category', 'author'])
            )->paginate(18)->withQueryString()

        ]);
    }

    public function show(Post $post)
    {
        return view('index.show', [
            'index' => $post
        ]);
    }

    // public function create()
    // {
    //     // if (auth()->guest()) {
    //     //     // abort(403);
    //     //     abort(Response::HTTP_FORBIDDEN);
    //     // }

    //     // if (auth()->user()?->username != 'ccmy'){
    //     //     abort(Response::HTTP_FORBIDDEN);
    //     // }

    //     return view('admin.posts.create');
    // }

    // public function store(Request $request)
    // {

        
    // //    if (request()->hasFile('thumbnail')) {
    // //             $path = request()->file('thumbnail')->store('thumbnails', 'public');
    // //             return 'Uploaded to: ' . $path;
    // //         } else {
    // //             return 'No thumbnail uploaded.';
    // //         }


    //     //ddd(request()->all());

    //     $attributes = $request->validate([
    //         'title' => 'required',
    //         'thumbnail' => 'required|image',
    //         'slug' => ['required', Rule::unique('posts', 'slug')],
    //         'excerpt' => 'required',
    //         'body' => 'required',
    //         'category_id' => ['required', Rule::exists('categories', 'id')]
    //     ]);
    
    //     $attributes['user_id'] = auth()->id();
    //     // $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails') ;
    
    //     if ($request->hasFile('thumbnail')) {
    //         $path = $request->file('thumbnail')->store('thumbnails', 'public');
    //         $attributes['thumbnail'] = $path;
    //     }
    
    //     Post::create($attributes);
    
    //     return redirect('/');

    // }
}