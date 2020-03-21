<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.account');
    }

    public function showUserAccounts()
    {
        $users = User::all()->where('role', '2');
        return view('accounts.admin.useraccounts')->with('users', $users);
    }
    public function showAllPosts()
    {
        $posts = Post::all();
        return view('accounts.admin.blogs')->with('posts', $posts);
    }
    public function showAllTags()
    {
        $tags = Tag::all();
        return view('accounts.admin.tags')->with('tags', $tags);
    }
}
