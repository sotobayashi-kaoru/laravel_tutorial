<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\validationPost;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $posts = Post::all();
        // return view('Posts.index',[
        //     'posts' => $posts
        // ]);
        $keywords = $request->get('keywords');


        $keywords = preg_split("/[\s+]+/", str_replace('　', ' ', $keywords));
        $posts = Post::where(function ($query) use($keywords) {
            foreach($keywords as $word){
                $query->where('content', 'like', '%'.$word.'%');
            }
        })->get();
        return view('posts.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('posts.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(validationPost $request)
    {
        $post = Post::create($request->all());
        $post->title = $request->title;
        $post->content = $request->content;
        // $post->users_id = $request->user()->id;
        $post->save();
        $request->session()->flash('message','記事の登録が完了しました。');
        return redirect()->route('posts.show',[$post->id]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    //     $comment = new Comment();
    //     $comments = $comment->where('post_id', $post->id)->get();
        return view('posts.show', [
            'post' => $post,
    //         // 'comments' => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(ValidationPost $request, Post $post)


    {
        $post->update($request->all());
        $request->session()->flash('message','記事の編集が完了しました。');
   	    return redirect()->route('posts.show',[$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // \DB::transaction(function () use ($post) {
            //select * from comment where post_id = "post->id";
            // $comments = Comment::where('post_id', $post->id)->get();
            // foreach($comments as $comment) {
                // $comment->delete();
            // }
            $post->delete();
            return redirect()->route('posts.index')->with('message','記事の削除が完了しました。');
    }
}
?>
