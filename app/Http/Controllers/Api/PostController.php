<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->paginate(10);
        return PostResource::collection($posts);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    
    $validated = $request->validate(
        [
        'title' => 'required|string|max:255',
        'body'  => 'required|string',
    ]);

    
    $posts = Post::create([
        'title'   => $validated['title'],
        'body'    => $validated['body'],
        'user_id' => 8,
    ]);

    return new PostResource($posts);
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $posts=Post::find($id);
        return new PostResource($posts);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

    
    $validated = $request->validate(
        [
        'title' => 'required|string|max:255',
        'body'  => 'required|string',
    ]);

    
    $posts = Post::findOrFail($id);

    
    $posts->update([
        'title' => $validated['title'],
        'body'  => $validated['body'],
    ]);

    
    return new PostResource($posts);

    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
    {
        
    $posts = Post::findOrFail($id);
    $posts->delete();

    return new PostResource($posts);
    }


}
