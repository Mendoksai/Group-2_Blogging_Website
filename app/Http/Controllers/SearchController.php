<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchTitle(Request $request)
    {
        $query = $request->input('query');

        // Perform the search query
        $results = Post::where('title', 'like', '%' . $query . '%')->get();

        return view('layouts.search-results', compact('results', 'query'));
    }
}