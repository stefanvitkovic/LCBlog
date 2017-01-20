<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $comment = new Comment($request->all());
        $comment->save();

        return back()->with('message','Comment added');
    }
   
    public function edit(Comment $id)
    {
        return view('commentEdit',['comment'=>$id]);
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
        $comment = Comment::findOrFail($id);
        $comment->name = $request->name;
        $comment->body = $request->body;
        $comment->save();

        return redirect()->route('show', ['id' => $comment->article_id])->with('message','Comment modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('show', ['id' => $comment->article_id])->with('message','Comment deleted');
    }
}
