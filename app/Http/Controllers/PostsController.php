<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller {

    private $imagePath = "images/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name) {
        $posts = DB::table('posts')->join('users', 'users.id', '=', 'posts.user_id')
            ->where('users.name', '=', $name)->orderBy('posts.created_at', 'desc')->get();

        if(Auth::check() && Auth::user()->name == $name){
            return view('posts.owner', compact('posts'));
        } else {
            return view('posts.index', compact('posts'));
        }
    }


    public function lastPostsFromDistinctUser() {
        $posts = array();
        $usersWithPost = Post::distinct()->get(['user_id']);
        foreach ($usersWithPost as $user) {
            $post = Post::where('user_id','=', $user->user_id)->orderBy('created_at', 'desc')->first();

            $posts[] = $post;
        }
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request) {
        $post = new Post;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        if($file = $request->file('file')){

            $name = md5($file->getClientOriginalName() . microtime());
            $file->move($this->imagePath, $name);
            $post->path = $name;
        }
        $post->save();
        return $this->index(Auth::user()->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
