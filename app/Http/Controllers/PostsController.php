<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(4);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        /////////////// File upload

        // $file = $request->file('file');
        // echo "<br>";
        // echo $file->getClientOriginalName();
        // echo "<br>";
        // echo $file->getSize();


        // save to database

        $input = $request->all();
        if($file = $request->file('file')){
            $name = $file->getClientOriginalName();
            $file->move('images',$name);
            $input['path']=$name;
        }

        Post::create($input);

        ////////////////////

       // return $request->get('title');
       // or
       //  return $request->title;


    // not needed if using request class
        // $this->validate($request,[  //validation
        //     'title'=>'required|max:50'  //required and max 50 char
        // ]);
    //
    
        // Post::create($request->all());
        // return redirect()->to('/posts');


        // or
        // 
        // $input = $request->all();
        // $input['title'] = $request->title;
        // Post::create($request->all());

        // $post = new Post;
        // $post->title = $request->title;
        // $post->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::findOrFail($id);
        return view('posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('posts.edit',compact('posts'));
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
        $this->validate($request,[  //validation
            'title'=>'required|max:50'  //required and max 50 char
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('posts');

    }


    // custom controller

    public function showContact($name)
    {
        $people = ['Bob', 'Jim', 'Jimbob'];

        return view('contact', compact('people'));

    }

    public function showPost($id,$name)
    {

        // return view('post')->with('id',$id);
        return view('post', compact('id','name'));

    }

}
