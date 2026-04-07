<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class SearchController extends Controller
{
    public function index()
    {
        
        $hotels = Hotel::with('images')->get();
        $cities = Hotel::select('city')->distinct()->pluck('city');

        return view('home', compact('hotels', 'cities'));
    }

    public function search(Request $request)
    {
        $query = Hotel::with('images');

        if ($request->filled('q')) {
            $query->where('name', 'like', "%{$request->q}%")
                  ->orWhere('city', 'like', "%{$request->q}%")
                  ->orWhere('description', 'like', "%{$request->q}%");
        }

        // Фильтры
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }
        if ($request->filled('stars')) {
            $query->where('stars', $request->stars);
        }

        // Сортировка
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('price_per_night');
                    break;
                case 'price_desc':
                    $query->orderByDesc('price_per_night');
                    break;
                case 'name_asc':
                    $query->orderBy('name');
                    break;
                case 'name_desc':
                    $query->orderByDesc('name');
                    break;
                default:
                    $query->orderBy('id', 'desc');
            }
        }

        $hotels = $query->get();

        if ($request->ajax()) {
            return view('partials.hotel_cards', compact('hotels'))->render();
        }

        $cities = Hotel::select('city')->distinct()->pluck('city');
        return view('home', compact('hotels', 'cities'));
    }
}