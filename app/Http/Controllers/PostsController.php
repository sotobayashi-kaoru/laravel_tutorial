<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        echo 'test';
        $posts = Post::all();

        return view('Posts.index',[
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // postモデルのインスタンス生成
        $post = new Post();
        // create.blade呼び出し、postをviewに渡す
        return view('posts.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $post = new Post();
        // 入力されたフィールドの値を取得
        $post->title = $request->title;
        // 入力されたフィールドの値を取得
        $post->content = $request->content;
        // ユーザーIDの取得
        $post->users_id = $request->user()->id;
        // DBへの保存　insertクエリ？
        $post->save();
        $request->session()->flash('message','記事の登録が完了しました。');
        // 作成した記事のIDをshow.bladeで表示
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
        $comment = new Comment();
        //select * from comment where post_id = "post->id";
        $comments = $comment->where('post_id', $post->id)->get();

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
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
    public function update(ArticleRequest $request, Post $post)
    {
        // 全件取得
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
        \DB::transaction(function () use ($post) {
            //select * from comment where post_id = "post->id";
            $comments = Comment::where('post_id', $post->id)->get();
            //取ってきた各コメントを削除
            foreach($comments as $comment) {
                $comment->delete();
            }
            $post->delete();
        });
        return redirect()->route('posts.index')->with('message','記事の削除が完了しました。');
    }
}
?>
