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
        
        // Проверка, бронировал ли пользователь этот отель
        $hasBooked = auth()->user()->bookings()
            ->where('hotel_id', $hotelId)
            ->where('status', 'completed')
            ->exists();
            
        if (!$hasBooked && !auth()->user()->isAdmin()) {
            return back()->withErrors(['comment' => 'Вы можете оставить отзыв только после проживания']);
        }
        
        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5'
        ]);
        
        Comment::create([
            'user_id' => auth()->id(),
            'hotel_id' => $hotelId,
            'comment' => $validated['comment'],
            'rating' => $validated['rating']
        ]);
        
        return back()->with('success', 'Спасибо за ваш отзыв!');
    }
    
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        
        if ($comment->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403);
        }
        
        $comment->delete();
        
        return back()->with('success', 'Комментарий удален');
    }
}