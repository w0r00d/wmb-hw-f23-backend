<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;
use Illuminate\Support\Facades\Auth;
class ArtistController extends Controller
{
 
    public function index()
    {
        $artists = Artist::all(); // Retrieve all songs with their associated artists
    
        return response()->json(['data' => $artists], 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'country' => 'required',
        ]);

        // Create a new artist
        $artist = new Artist();
        $artist->fname = $request->input('fname');
        $artist->lname = $request->input('lname');
        $artist->gender = $request->input('gender');
        $artist->country = $request->input('country');
        $artist->save();

        return response()->json(['message' => 'Artist created successfully', 'data' => $artist],  201);
    }
}
