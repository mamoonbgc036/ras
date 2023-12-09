<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    public function search(Request $request)
    {
        $posts = Post::whereDate('created_at', $request->date)->paginate(3);
        return view('post.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // http: //127.0.0.1:8000/storage/images/WZXE7HejQE9KFBxoVKsl9RhxzTEZMZwqxZtEq5zh.jpg
        $user = Auth::user();
        $post_info = $request->validated();
        $image_path = Storage::put('/post', $request->file('image'));
        $post_info['image'] = $image_path;
        // $post_info['user_id'] = Auth::user()->id;
        // Post::create($post_info);
        $user->posts()->create($post_info);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function toggle($id)
    {
        $post = Post::find($id);

        $toggle = $post->toggle ? 0 : 1;

        Post::where('id', $id)->update(['toggle' => $toggle]);
        return redirect()->route('post.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $post_update_info = $request->validated();
        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $image_path = Storage::put('/post', $request->file('image'));
            $post_update_info['image'] = $image_path;
        }

        $post->update($post_update_info);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Storage::disk('public')->delete($post->image);
        return back();
    }
}
