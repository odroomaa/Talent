<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$post = Post::all(); || $post = DB::select(SELECT * FROM POST);(we want to show all posts )
        //the following  code, we want the latest post to  show on feed as first 
        $posts = Post::OrderBy('id','desc')->get();
        return view('hanze.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required','min:2','max:30'],
            'post'=>['required','mimes:mp4,mov,mkv,avi','max:50000'],
            'description'=>['required'],
        ]);

        //Get the OG file name
        $ogname = $request->file('post')->getClientOriginalName();
        //Get also path info of our file
        $filename = pathinfo($ogname,PATHINFO_FILENAME);
        //Get the file extension
        $extension = $request->file('post')->getClientOriginalExtension();
        //File name we want to store
        $filenametostore = $filename.'_'.time().'_'.$extension;
        //Where we want to store it in vscode
        $path = $request->file('post')->storeAs('public\uploads',$filenametostore);
        
        $table = New Post();
        //$user = User::get(auth()->id())->first();
        $table->title=$request->title;
        $table->post = $filenametostore; 
        //$userid = User::WHERE(['id'=>auth()->id('id')])->first();
        //$table->user_id = Auth::user()->id;//On browser
        $table->user_id = Auth::user()->id;//on api
        $table->description = $request->description;      
        
        $table->save();
        $username  = Auth::user()->name;
        return response([
            'post'=>$table,
            'posted by'=>$username
        ],200);
        //return view('hanze.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('hanze.show')->with('posts',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
