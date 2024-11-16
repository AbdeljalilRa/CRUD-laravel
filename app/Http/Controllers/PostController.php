<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;

class PostController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postFromDB= Post::all();
        
        return view('posts.index',['posts'=>$postFromDB]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $users =User::all();
       // dd($users);
        return view('posts.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $all= request()->all();
        $title = request()->title;
        $description = request()->description;
        $post_Creator = request()->post_Creator;
        $image = request()->image;
        
        //dd($title,$description,$post_Creator);
        

       request()->validate([
        'title'=> ['required','string','min:3'],
        'description'=> ['required','string',"min:5"],
        'post_Creator'=>['required','exists:users,id',],
        'image' =>'required|image',
        
        ]);

        $file = $request->file('image');
        $exten= $file->getClientOriginalExtension();
        $newName = uniqid('',true).'.'.$exten;  
        $destinationPath= 'image';
        $file->move($destinationPath,$newName);


        $Post = new Post();
        $Post->title = $request->title;
        $Post->description = $request->description;
        $Post->user_id= $request->post_Creator;
        $Post->image = $newName;
        $Post->save();

       /*Post::create([
        'title'=> $title,
        'description'=> $description,
        'user_id'=> $post_Creator,

        ]) ;*/
        

        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //$singlePostFromDB = post::findOrFail($postid);
        return view('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {

       // dd($post);
        $users =User::all();
        return view('posts.edit',['users'=>$users,'post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($postid)
    {
        $title = request()->title;
        $description = request()->description;
        $post_Creator = request()->post_Creator;
        
        //dd($title, $description, $post_Creator);
        request()->validate([
            'title'=> ['required','string','min:3'],
            'description'=> ['required','string',"min:5"],
            'post_Creator'=>['required','exists:users,id',],
            ]);

        $singlePostFromDB = post::findOrFail($postid);
        $singlePostFromDB->UPDATE([
            'title'=>$title,
            'description'=>$description,
            'user_id'=> $post_Creator,
            ]);
        return to_route('posts.show',$postid);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($postid)
    {
        $post = Post::findOrFail($postid);
        $post->delete();
        return to_route('posts.index');
    }
}
