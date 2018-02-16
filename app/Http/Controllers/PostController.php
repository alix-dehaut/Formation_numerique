<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('back.post.index', ["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('back.post.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'description'=> 'required|string',
            'category_id'=> 'required|integer',
            'post_type'=> 'required|string',
            'students_max'=> 'required|integer',
            'price'=> 'required|integer',
            'started_at'=>'required|date|after:tomorrow',
            'ended_at'=>'required|after:started_at',
            'status'=> 'in:published, unpublished',
            'title_image' => 'string|nullable',
            'picture' => 'image|max:3000',
        ]);

        $post= Post::create($request->all());

        $im = $request->file('picture');
        if (!empty($im)) {
            
            $link = $request->file('picture')->store('./');

            $post->picture()->create([
                'link' => $link,
                'title' => $request->title_image?? $request->title
            ]);
        }

        return redirect()->route('post.index')->with('message', 'Post enregistré!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
        return view('back.post.show',["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
        $categories = Category::pluck('name', 'id')->all();

        return view('back.post.edit', ["post"=>$post, "categories"=>$categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'description'=> 'required|string',
            'category_id'=> 'required|integer',
            'post_type'=> 'required|string',
            'students_max'=> 'required|integer',
            'price'=> 'required|integer',
            'started_at'=>'required|date|after:tomorrow',
            'ended_at'=>'required|after:started_at',
            'status'=> 'in:published, unpublished',
            'title_image' => 'string|nullable',
            'picture' => 'image|max:3000',
        ]);

        $post= Post::find($id);

        $post->update($request->all());

        $im = $request->file('picture'); 
        
        if (!empty($im)) {

            $link = $request->file('picture')->store('./');

            if(count($post->picture)>0){
                Storage::disk('local')->delete($post->picture->link); 
                $post->picture()->delete(); 
                }

            $post->picture()->create([
                'link' => $link,
                'title' => $request->title_image?? $request->title
            ]);
        }

        return redirect()->route('post.index')->with('message', 'post modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->delete();

       return redirect()->route('post.index')->with('message', 'delete success');
    }
}
