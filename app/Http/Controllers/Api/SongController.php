<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;

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
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'ArtistId' => 'required|exists:artists,id',
        ]);

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
