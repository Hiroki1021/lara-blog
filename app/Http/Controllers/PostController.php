<?php

namespace App\Http\Controllers;
//postモデルを使う宣言
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    function index()
    {
        //Postsテーブルから全部のデータを取ってくる
        $posts = Post::all();
        // dd($posts);
        return view('posts.index', ['posts'=>$posts]);
    }

    function create()
    {
        return view('posts.create');
    }

    function store(Request $request)
    {
        // dd($request);
        //$requestに入っている値を、new Postでデータベースに保存する記述
        $post = new Post;
        //左辺：テーブル、右辺が送られてきた値（createから送られてきたnameが入っている）
        $post -> title = $request -> title;
        $post -> body = $request -> body;
        $post -> user_id = Auth::id();

        $post -> save();

        return redirect()->route('posts.index');
    }
}
