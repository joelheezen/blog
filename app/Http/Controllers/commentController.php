<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'comment' => 'required',
            'headline' => 'required',
        ]);

        $comment = new \App\Comment();
        $comment->headline = $request->get('headline');
        $comment->comment = $request->get('comment');
        $comment->users_id = $request->get('users_id');
        $comment->blogItems_id = $request->get('blogItems_id');

        $comment->save();
        return redirect()->back()->with('success', 'comment is opgeslagen!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $request->validate([
            'comment' => 'required',
            'headline' => 'required',
        ]);

        $comment = \App\Comment::find($id);
        $comment->comment = $request->get('comment');
        $comment->headline = $request->get('headline');

        $comment->save();
        return redirect()->back()->with('success', 'comment has been edited!');
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
        $comment = \App\Comment::find($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment has been deleted!');
    }
}
