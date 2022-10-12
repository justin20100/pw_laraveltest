<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use mysql_xdevapi\Table;
use Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        $categories = Category::get();
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedPostData = $request->only('title', 'body', 'excerpt');
        $validatedPostData['slug'] = Str::slug($validatedPostData['title']);
        $validatedPostData['user_id'] = auth()->id();
        $validatedCategoryId = $request->only('category_id');

        $post = Post::create($validatedPostData);
        foreach ($validatedCategoryId as $id) {
            $post->categories()->attach($id);
        }
        return view('posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return Application|Factory|View
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
