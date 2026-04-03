<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
   //список избранных 
    public function index()
    {
        $likedHotels = auth()->user()->likedHotels()->with('images')->paginate(12);
        
        return view('likes.index', compact('likedHotels'));
    }
    
    public function toggle(Hotel $hotel)
    {
        $like = Like::where('user_id', auth()->id())
                    ->where('hotel_id', $hotel->id)
                    ->first();
        
        if ($like) {
            // Удаление
            $like->delete();
            $liked = false;
        } else {
            // Добавление
            Like::create([
                'user_id' => auth()->id(),
                'hotel_id' => $hotel->id
            ]);
            $liked = true;
        }
        
        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'liked' => $liked,
                ]);
        }
        
        return back()->with('success');
    }

    //проверка
    public function check(Hotel $hotel)
    {
        $liked = auth()->user()->likedHotels()->where('hotel_id', $hotel->id)->exists();
        
        return response()->json([
            'liked' => $liked
        ]);
    }
}