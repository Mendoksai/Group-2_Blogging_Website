<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function showByDegree($degreeName)
    {
        // Fetch posts with the given degree name
        $posts = Post::where('degree_name', $degreeName)->get();

        return view('profile.partials.by_degree', compact('posts', 'degreeName'));
    }

    public function update(Request $request, $postId)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Update the post
        $post = Post::findOrFail($postId);
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->save();

        // Redirect or return a response as needed
        return redirect()
            ->back()->with('postUpdate', 'Updating post successfully.');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'user_id' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = Auth::user()->id;
        $post->first_name = Auth::user()->first_name;
        $post->last_name = Auth::user()->last_name;
        $post->account_role = Auth::user()->account_role;
        $post->degree_name = Auth::user()->degree_name;
        $post->save();

        // $postsData = Post::select('user_id', 'title', 'content')->get();
        $data = Post::all();
        // dd($data);

        return redirect()
            ->back()->with('postDone', 'Creating post successfully.');
    }

    public function destroy(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        if ($post->user_id !== $request->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();

        return redirect()->back()->with('postDeleted', 'Your post deleted successfully.');

        // $userID = $posts->user_id;
        // $loginUSerID = $request->user()->id;
        // return dd('post-userID'. $userID.'\login-userID'. $loginUSerID  );
        // // Check if the authenticated user is the owner of the post
        // if ($posts->user_id !== $request->user()->id) {
        //     abort(403, 'Unauthorized action.');
        // }

        // $posts->delete();

        // return redirect()->back()->with('postDeleted', 'Post deleted successfully.');
    }


    public function index()
    {
        $data = Post::all();
        dd($data);

        return view('list', $data);

    }

}