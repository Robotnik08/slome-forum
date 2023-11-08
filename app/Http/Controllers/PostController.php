<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Fetch all posts from the database
        $posts = Post::all();

        // Pass the posts to the view for rendering
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // Return the view for creating a new post
        return view('posts.create');
    }

    public function store(Request $request)
    {
        
        // Validate and store the new post in the database
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $post = Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'name' => auth()->user()->name,
            'user_id' => auth()->user()->id,
        ]);

        // Redirect to the index page or to the newly created post
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        // Show a specific post and its comments
        return view('posts.show', compact('post'));
    }
}
