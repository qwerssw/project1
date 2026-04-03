<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Hotel;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $hotelId)
    {
        $hotel = Hotel::findOrFail($hotelId);
        
        
        $validated = $request->validate([
            'comment' => 'required|string|min:3|max:1000',
            'rating' => 'required|integer|min:1|max:5'
        ]);
        
        Comment::create([
            'user_id' => auth()->id(),
            'hotel_id' => $hotelId,
            'comment' => $validated['comment'],
            'rating' => $validated['rating']
        ]);
        
        return back()->with('success');
    }
    
}