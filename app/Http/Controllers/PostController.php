<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ดึงข้อมูลทั้งหมดจากฐานข้อมูล
        $posts = Post::all();
        // ส่งตัวแปร $posts ไปหน้า index ด้วย compact
        return view('index', compact(('posts')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('basic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Post::create($request->only(['title', 'content']));

        return redirect()->route('index')->with('success', 'Post Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('basic.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('basic.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->update($request->only(['title', 'content']));

        return redirect()->route('index')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('index')->with('success', 'Delete Success!');

    }
}