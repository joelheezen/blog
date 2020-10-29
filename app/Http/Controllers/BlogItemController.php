<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogItems = \App\BlogItem::all()->sortByDesc("created_at")->sortBy("hidden");
        return view('blog-items.index', [
            'blogItems' => $blogItems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog-items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'fulltext' => 'required',
            'category_id' => 'required',
        ]);

        $blogItem = new \App\BlogItem();
        $blogItem->title = $request->get('title');
        $blogItem->description = $request->get('description');
        $blogItem->image = $request->get('image');
        $blogItem->fulltext = $request->get('fulltext');
        $blogItem->category_id = $request->get('category_id');

        $blogItem->save();
        return redirect('posts')->with('success', 'Blogpost is opgeslagen!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $blogItem = \App\BlogItem::find($id);
            $error = null;
        } catch (\Exception $e) {
            $blogItem = null;
            $error = $e->getMessage();
        }


        return view('blog-items.show', [
            'blogItem' => $blogItem,
            'error' =>$error,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $blogItem = \App\BlogItem::find($id);
            $error = null;
        } catch (\Exception $e) {
            $blogItem = null;
            $error = $e->getMessage();
        }


        return view('blog-items.edit', [
            'blogItem' => $blogItem,
            'error' =>$error,
            'id' =>$id,
        ]);
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
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'fulltext' => 'required',
            'category_id' => 'required',
            'image' => 'required',
        ]);

        $post = \App\BlogItem::find($id);
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->fulltext = $request->get('fulltext');
        $post->category_id = $request->get('category_id');
        $post->image = $request->get('image');

        $post->save();
        return redirect('posts')->with('success', 'Post has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $post =\App\BlogItem::find($id);
        $post->delete();

        return redirect('posts')->with('success', 'Post has been deleted!');
    }

    /**
     * Update the specified resource in storage to show it.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unhide(Request $request, $id)
    {
        $post = \App\BlogItem::find($id);
        $post->hidden = 0;

        $post->save();
        return redirect('posts')->with('success', 'Post has been put back in the list!');
    }

    /**
     * Update the specified resource in storage to hide it.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hide(Request $request, $id)
    {
        $post = \App\BlogItem::find($id);
        $post->hidden = 1;

        $post->save();
        return redirect('posts')->with('success', 'Post has been hidden!');
    }
}
