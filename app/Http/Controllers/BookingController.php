<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->bookings()->with('hotel')->latest()->paginate(10);
        return view('bookings.index', compact('bookings'));
    }
    
    public function create($hotelId)
    {
        $hotel = Hotel::findOrFail($hotelId);
        return view('bookings.create', compact('hotel'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
        ]);
        
        $hotel = Hotel::findOrFail($validated['hotel_id']);
        
        // Проверка доступности
        $existingBooking = Booking::where('hotel_id', $hotel->id)
            ->where('status', '!=', 'cancelled')
            ->where(function($query) use ($validated) {
                $query->whereBetween('check_in', [$validated['check_in'], $validated['check_out']])
                    ->orWhereBetween('check_out', [$validated['check_in'], $validated['check_out']]);
            })->exists();
            
        if ($existingBooking) {
            return back()->withErrors(['dates' => 'Отель не доступен на выбранные даты']);
        }
        
        $checkIn = Carbon::parse($validated['check_in']);
        $checkOut = Carbon::parse($validated['check_out']);
        $nights = $checkOut->diffInDays($checkIn);
        $totalPrice = $nights * $hotel->price_per_night;
        
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'hotel_id' => $hotel->id,
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'total_price' => $totalPrice,
            'status' => 'confirmed'
        ]);
        
        return redirect()->route('bookings.show', $booking->id)
            ->with('success', 'Бронирование успешно создано!');
    }
    
    public function show($id)
    {
        $booking = Booking::with(['hotel', 'user'])->findOrFail($id);
        
        // Проверка прав доступа
        if ($booking->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403);
        }
        
        return view('bookings.show', compact('booking'));
    }
    
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }
        
        $booking->update(['status' => 'cancelled']);
        
        return redirect()->route('bookings.index')
            ->with('success', 'Бронирование отменено');
    }
}