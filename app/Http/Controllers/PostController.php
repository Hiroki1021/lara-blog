<?php

namespace App\Http\Controllers;
//postモデルを使う宣言
use App\Models\Post;

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
}
