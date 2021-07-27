<?php

namespace App\Http\Controllers;


    use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        return view('insert');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
        $post = new post;
        $post->post_title = $request->get('title');
        $post->post_author = $request->get('author');

        $post->save();
        return redirect('show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        $posts = post::all();
        return view('show', ['posts' => $posts]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function edit(Post $post, $id)
    {
        $posts = post::find($id);
        return view('edit', ['posts' => $posts]);


    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Post $post, $id)
    {

        $posts = post::find($id);
        $posts->post_title = $request->get('title');
        $posts->post_author = $request->get('author');
        $posts->save();
        return redirect('show');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     *
     *
     */
    public function delete($id)
    {
      $posts = post::find($id);
      $posts->delete($id);
      return redirect('show');


    }
    public function showinput(Request $request)
    {
        return $_POST['author'];
    }
}
