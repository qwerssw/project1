<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Показать список избранных отелей пользователя
     */
    public function index()
    {
        $likedHotels = auth()->user()->likedHotels()->with('images')->paginate(12);
        
        return view('likes.index', compact('likedHotels'));
    }
    
    /**
     * Добавить или удалить лайк (избранное)
     */
    public function toggle(Hotel $hotel)
    {
        $like = Like::where('user_id', auth()->id())
                    ->where('hotel_id', $hotel->id)
                    ->first();
        
        if ($like) {
            // Удаляем лайк
            $like->delete();
            $message = 'Отель удален из избранного';
            $liked = false;
        } else {
            // Добавляем лайк
            Like::create([
                'user_id' => auth()->id(),
                'hotel_id' => $hotel->id
            ]);
            $message = 'Отель добавлен в избранное';
            $liked = true;
        }
        
        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'liked' => $liked,
                'likes_count' => $hotel->likes()->count()
            ]);
        }
        
        return back()->with('success', $message);
    }
    
    /**
     * Проверить, есть ли отель в избранном
     */
    public function check(Hotel $hotel)
    {
        $liked = auth()->user()->likedHotels()->where('hotel_id', $hotel->id)->exists();
        
        return response()->json([
            'liked' => $liked
        ]);
    }
}