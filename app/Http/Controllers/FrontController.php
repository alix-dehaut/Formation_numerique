<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cache;

class FrontController extends Controller
{
    public function index(){

        $prefix=request()->page?? 'home';
        $path= 'post'.$prefix;

    	$posts = Cache::remember($path, 60*24, function(){
            return Post::published()->with('picture', 'category')->orderBy('started_at','asc')->paginate(2);
        });
        
    	return view('front.index', ["posts"=>$posts]);
    }

    public function show(int $id){
    	$post = Post::find($id);

    	return view ('front.show', ['post'=>$post]);

    }

    public function showByType($post_type){
    	$posts= Post::published()->where('post_type', $post_type)->with('picture', 'category')->orderBy('started_at', 'asc')->paginate(5);

    	return view ('front.showByType', ['posts'=>$posts, 'post_type'=>$post_type]);
    }

    public function contactForm()
    {
        return view('front.contact');
    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'message'=>'required', 
        ]);

        Mail::to('administrateur@chezmoi.com')
            ->send(new Contact($request->except('_token')));
 
        return back()->with('message', 'Votre message à bien été envoyé');
    }

    public function search (){
        $q = Input::get ( 'q' );
        $posts = Post::where ( 'title', 'LIKE', '%' . $q . '%' )->orWhere ( 'description', 'LIKE', '%' . $q . '%' )->paginate(5);

        if (count ( $posts ) > 0)
            return view ( 'front.searchResult',['posts'=>$posts, 'q'=>$q] );
        else
            return view ( 'front.searchResult' )->withMessage ( 'Aucuns resultats pour votre recherche!' );
    }
}
