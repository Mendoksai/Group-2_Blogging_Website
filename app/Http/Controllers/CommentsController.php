<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('chirps.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'post_id' => 'required|exists:posts,id',
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            'comment_content' => 'required',
        ]);
        //return dd($data);

        $comment = new Comments();
        $comment->post_id = $data['post_id'];
        $comment->user_id = auth()->id(); // Assuming you have authentication set up
        $comment->comment_content = $data['comment_content'];
        $comment->save();


        return Redirect::route('dashboard')->with('commentCreated', 'Comment posted successfully.');
    }

    public function updateReply(Request $request, Comments $reply)
    {
        // Validate the input data
        $request->validate([
            'comment_content' => 'required|string',
        ]);

        // Update the reply comment content
        $reply->comment_content = $request->input('comment_content');
        $reply->save();

        // Redirect back or do any other necessary actions
        return redirect()->back()->with('replyUpdated', 'Reply comment updated successfully');
    }

    public function destroy(Comments $comment)
    {
        // Perform authorization to ensure the user is allowed to delete the comment

        $comment->delete();

        // Optionally, you can add a flash message or perform any other actions

        return redirect()->back()->with('commentDeleted', 'Comment deleted successfully');

    }

    public function storeReply(Request $request, Comments $comment)
    {
        //return dd($request->all());
        // Validate the input data
        $request->validate([
            'reply' => 'required|string',
        ]);

        // Create a new comment instance for the reply
        $reply = new Comments();
        $reply->post_id = $comment->post_id;
        $reply->user_id = auth()->user()->id;
        $reply->comment_content = $request->input('reply');
        $reply->parent_id = $comment->id;

        // Save the reply
        $reply->save();

        // Redirect back or do any other necessary actions
        return redirect()->back()->with('replySuccess', 'reply sent successfully');
    }

    public function destroyReply(Comments $reply)
    {
        // Check if the authenticated user is the owner of the reply
        if ($reply->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized');
        }

        // Delete the reply
        $reply->delete();

        // Optionally, you can redirect back to the original page or return a success message
        return redirect()->back()->with('success', 'Reply deleted successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comment)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'comment_content' => 'required|max:255',
        ]);

        // Update the comment content
        $comment->comment_content = $validatedData['comment_content'];
        $comment->save();

        return redirect()->back()->with('commentEditSuccess', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

}