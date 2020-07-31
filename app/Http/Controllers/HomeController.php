<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\User;
use App\Post;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != ''){
            $posts = Post::where('title',$cond_title)->get();
        } else {
        $posts = Post::where('status', Post::PUBLISHED)->get();
        }

        return view('top',['posts'=> $posts,'cond_title' => $cond_title]);
    }

    public function show(Request $request)
    {
        $post = Post::find($request->id);
        return view('top_show',['post'=>$post]);
    }
}
