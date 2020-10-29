<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ViewCounterController extends Controller
{
    //
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function count(Request $request){

        $blogId = $request->input('blog-id');
        $userId = Auth::user()->id;

        $user = \App\User::find($userId);
        $user->views += 1;

        $user->save();

        return redirect()->route('posts.show', $blogId);
    }
}
