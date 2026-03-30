<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotel::query();
        

        if ($request->has('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }
        

        if ($request->has('min_price')) {
            $query->where('price_per_night', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price_per_night', '<=', $request->max_price);
        }
        
        $hotels = $query->paginate(9);
        
        return view('home', compact('hotels'));
    }


    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
return view('show', compact('hotel'));    }
}