<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{

    //can't use urls (block urls using middleware)
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.blogpage')
               ->with('posts', Post::orderBy('updated_at', 'DESC')->get()); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * use to show page
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * use to store and save data
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImage = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        // move the image to folder inside our public
        $request->image->move(public_path('images'), $newImage);

        //setting slug                  //model   //column name(slug)  //what the refer 
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        //create post
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => $slug,
            'image_path' => $newImage,
            'user_id' => auth()->user()->id
        ]);

        //success / fail renders
         return redirect('/blog')->with('message', 'You post a new post to your blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //show read more post with slug (get one post)
        return view('blog.showdetails')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // page navigation
        return view('blog.updatedetails')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        //update details
        Post::where('slug', $slug)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => $slug,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'Your post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //distroy using slug
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')->with('message', 'Your post Deleted successfully');
    }
}
