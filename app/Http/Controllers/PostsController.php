<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers;
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

        $keywords = $request->get('keywords');
        $fromDate = $request->get('fromDate');
        $toDate = $request->get('toDate');
        $dateCheck = $request->get('dateCheck');

        $keywords = preg_split("/[\s+]/", str_replace('　', ' ', $keywords));


        $posts = Post::where(function ($query) use($keywords, $fromDate, $toDate, $dateCheck) {
            foreach($keywords as $word){
                if($word){
                    $query->where('content', 'like', "%{$word}%");
                }
            }
            if($dateCheck){
                if($fromDate){
                    $query->whereDate('created_at','>=' ,$fromDate);
                }
                if($toDate){
                    $query->whereDate('created_at', '<=', $toDate);
                }
            }
        })->latest('created_at')->paginate(10);


            return view('posts.index', compact('posts','fromDate','toDate'));
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
        // $comment = Comment::find(1);
        // $comments = Comment::where("id", 1)->get();
        // $comments_36 = Comment::where("post_id", 36)->get();
        // dump($comment);
        // dump($comments);
        // dump($comments_36);

        // die;
        $comments = Comment::where("post_id", $post->id)->get();

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
    public function update(Request $request, Post $post)
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
            $post->delete();
            $comment = new Comment();
            $comment::where('post_id',$post->id)->delete();
            return redirect()->route('posts.index')->with('message','記事の削除が完了しました。');
        }


    public function comment(Request $request)
    {
        $comment = comment::create($request->all());
        $comment->save();
        $request->session()->flash('message', 'コメントしました。');
        return redirect()->route('posts.show', [$comment->post_id]);
    }
}
?>
