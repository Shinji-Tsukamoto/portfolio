<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Http\Requests\Post\StoreRequest;



class PostController extends Controller
{
    //
    public function add()
    {
        return view('user.diary.create');
    }

    public function create(StoreRequest $request)
    {
    // dd('hello');

        $diary =new Post;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $diary->image_path =basename($path);
        } else {
            $diary->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);

        $diary->fill($form);
        $diary->user_id=Auth::id();
        $diary->save();
        
        return redirect('user/diary/create');
    }

    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != ''){
            $posts = Post::where('title', $cond_title)->get();
        } else {
            $posts = Post::all();
        }
        return view('user.diary.index',['posts' => $posts,'cond_title' => $cond_title]);
    }

    public function show(Request $request)
    {
        $post = Post::find($request->id);
        return view('user.diary.show',[
            'post'=>$post
        ]);
    }

    public function edit(Request $request)
    {
        $diary = Post::find($request->id);
        if (empty($diary)) {
            abort(404);
        }
        return view('user.diary.edit', ['diary_form' => $diary]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Post::$rules);
        $diary = Post::find($request->id);
        $diary_form = $request->all();
        if (isset($diary_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $diary->image_path = basename($path);
            unset($diary_form['image']);
        } elseif (isset($request->remove)) {
            $diary->image_path = null;
            unset($diary_form['remove']);
        }
        unset($diary_form['_token']);

        $diary->fill($diary_form)->save();

        return redirect('user/diary/');
    }

    public function delete(Request $request)
    {
        $diary = Post::find($request->id);
        $diary->delete();
        return redirect('user/diary/');
    }
}
