<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    //
    public function index()
    {
        $songs = Song::with('artist')->get(); // Retrieve all songs with their associated artists

        return response()->json(['data' => $songs], 200);
    }
    public function store(Request $request)
    {
      
        $validator = Validator::make($request->all(),
            [
                'title' => 'required',
                'type' => 'required',
                'price' => 'required|numeric',
                'ArtistId' => 'required|exists:artists,id',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'validation error',
                'errors' => $validator->errors(),

            ], 400);
        }

        // Create a new song
        $song = new Song();
        $song->title = $request->input('title');
        $song->type = $request->input('type');
        $song->price = $request->input('price');
        $song->ArtistId = $request->input('ArtistId');
        $song->save();

        return response()->json(['message' => 'Song created successfully', 'data' => $song], 201);
    }
}
