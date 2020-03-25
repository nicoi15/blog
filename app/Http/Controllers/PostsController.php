<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Comment;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $selectedTags = [];
        $posts = Post::where('status', '1')->paginate(5);
        
        return view('pages.home')->with('posts', $posts)->with('tags', $tags)->with('selectedTags', $selectedTags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $tags = Tag::all();
            return view('blogs.create')->with('tags', $tags); 
        }
        else {
            return view('auth.login');
        }
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
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'tag' => 'required'
        ]);

        $post = new Post;
        if($request->has('image')) {
            
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
            $post->image = $url;
        }
        else {
            $url = 'noimage';
        }
        
        $post->image = $url;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->tag_id = $request->tag;
        $post->id = Auth::user()->id;

        $post->save();

        $newlyAddedPostId = DB::getPdo()->lastInsertId();

        return redirect('/account/blogs')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if ($post->status == 1) {

            $comments = Comment::where('post_id', $id)->paginate(5);

            return view('pages.blogcontent')->with('post', $post)->with('comments', $comments);
        }
        else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $tags = Tag::all();
            $post = Post::find($id);
            return view('blogs.edit')->with('post', $post)->with('tags', $tags); 
        }
        else {
            return view('auth.login');
        }
        
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
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $post = Post::find($id);

        if($request->has('image')) {
            
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
            $post->image = $url;
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->tag_id = $request->tag;
        $post->save();

        return redirect('/account/blogs')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($request->postid);

        if(Auth::user()->role == 1) {
            $post->status = '2';
            $post->save();
            return redirect('/admin/blogs')->with('success', 'Post has been deleted');
        }
        else {
            $post->status = '0';
            $post->save();
            return redirect()->back()->with('success', 'Post has been deleted');
        }
        
        
    }
    public function userPosts()
    {
        $user_id = Auth::user()->id;
        $posts = Post::all()->where('id', $user_id);

        return view('blogs.blog')->with('posts', $posts);
    }
    public function category(Request $request)
    {
        $selectedTags = $request->tag;
        $tags = Tag::all();

        $posts = Post::whereIn('tag_id', $selectedTags)->paginate(5);

        return view('pages.home')->with('posts', $posts)->with('tags', $tags)->with('selectedTags', $selectedTags);
    }
}
