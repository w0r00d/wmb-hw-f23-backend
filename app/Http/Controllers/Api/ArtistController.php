<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArtistController extends Controller
{
 
    public function index()
    {
        $artists = Artist::with('songs')->get(); // Retrieve all songs with their associated artists
    
        return response()->json(['data' => $artists], 200);
    }
    public function store(Request $request)
    {
        $request->validate([
          
        ]);
        $validator = Validator::make($request->all(),
        [
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'country' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'validation error',
                'errors' => $validator->errors(),

            ], 400);
        }
        // Create a new artist
        $artist = new Artist();
        $artist->fname = $request->input('fname');
        $artist->lname = $request->input('lname');
        $artist->gender = $request->input('gender');
        $artist->country = $request->input('country');
        $artist->save();

        return response()->json(['message' => 'Artist created successfully', 'data' => $artist], 201);
    }
}
