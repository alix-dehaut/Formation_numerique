<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FrontController extends Controller
{
    public function index(){
    	$posts = Post::orderBy('started_at','asc')->paginate(2);
    	return view('front.index', ["posts"=>$posts]);
    }

    public function show(int $id){
    	$post = Post::find($id);
    	return view ('front.show', ['post'=>$post]);

    }

    public function showByType($post_type){
    	$posts= Post::where('post_type', $post_type)->orderBy('started_at', 'asc')->paginate(5);
    	return view ('front.showByType', ['posts'=>$posts, 'post_type'=>$post_type]);
    }
}
