<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // private $posts =[
    //      1 => ['id' => 1, 'name' => 'Abdelrahman', 'address' => 'Cairo'],
    //     2 => ['id' => 2, 'name' => 'Ali', 'address' => 'Alexandria'],
    //     3 => ['id' => 3, 'name' => 'Sara', 'address' => 'Giza'],
    // ];

    public function index()
    {
        //$posts=Post::all();
        $posts = Post::withTrashed()->  paginate (10);
        return view("posts.index",['posts'=>$posts]);
        
    }

    public function create()
    {
        $users = User::all();

        return view ('posts.create',["users"=>$users]);
    }

    public function edit($id)

    {
        $post=Post::findOrFail($id);
        $users = User::all();
        return view ('posts.edit',["post"=>$post,"users"=>$users]);
    }
     public function show($id)
    {
         $post=Post::findOrFail($id);
        return view ('posts.show',["post"=> $post]);
    }

   public function store(StorePostRequest $request)
    {
    $data = $request->validated(); 

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('posts', 'public');
    }

    Post::create($data);

    return redirect('/posts');
    }

    public function update(StorePostRequest $request,$id)
    {
         $post = Post::findOrFail($id);
        $data = $request->validated();
        if($request->hasFile('image')){
            if($post->image){
                Storage::disk('public')->delete($post->image);
            }
            $data['image']=$request->file('image')->store('posts','public');

        }
        $post->update ($data);
      
        return redirect("/posts");

    }

    public function destroy($id)
    {
        

        $post=Post::findOrFail($id);
         if ($post->image) {
        Storage::disk('public')->delete($post->image);
    }

        $post->delete();
        return redirect('/posts');
    
    }
    public function restore($id)

    {

    $post = Post::withTrashed()->findOrFail($id);
    $post->restore();
    return redirect('/posts');
    
    }



    
}
