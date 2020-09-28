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
        $blogItems = \App\BlogItem::all();
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
        ]);

        $blogItem = new \App\BlogItem();
        $blogItem->title = $request->get('title');
        $blogItem->description = $request->get('description');
        $blogItem->image = $request->get('image');
        $blogItem->fulltext = $request->get('fulltext');

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
            $newsItem = null;
            $error = $e->getMessage();
        }

        return view('blog-items.show', [
            'blogItem' => $blogItem,
            'error' =>$error
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
