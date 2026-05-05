<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class SearchController extends Controller
{
    public function index()
    {
        
        $lang = app()->getLocale();

    $hotels = Hotel::with('images')->get();

    $cities = Hotel::select($lang == 'en' ? 'city_en' : 'city')
        ->distinct()
        ->pluck($lang == 'en' ? 'city_en' : 'city')
        ->filter();

    return view('home', compact('hotels', 'cities'));
    }

    public function search(Request $request)
    {
        $lang = app()->getLocale(); 

$nameColumn = $lang == 'en' ? 'name_en' : 'name';
$cityColumn = $lang == 'en' ? 'city_en' : 'city';
$descColumn = $lang == 'en' ? 'description_en' : 'description';
$query = Hotel::with('images');
if ($request->filled('q')) {
    $query->where(function($q) use ($request, $nameColumn, $cityColumn, $descColumn) {
        $q->where($nameColumn, 'like', "%{$request->q}%")
          ->orWhere($cityColumn, 'like', "%{$request->q}%")
          ->orWhere($descColumn, 'like', "%{$request->q}%");
    });
}

        // Фильтры
       if ($request->filled('city')) {
$query->where(function($q) use ($request, $cityColumn) {
    $q->where($cityColumn, 'like', '%' . $request->city . '%')
      ->orWhere('city', 'like', '%' . $request->city . '%');
});}
       if ($request->filled('stars')) {
    $query->where('stars', '>=', intval($request->stars));
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
                    $query->orderBy($nameColumn);
                break;
                case 'name_desc':
                    $query->orderByDesc($nameColumn);
                break;
                default:
                    $query->orderBy('id', 'desc');
            }
        }

        $hotels = $query->get();

        if ($request->ajax()) {
            return view('partials.hotel_cards', compact('hotels'))->render();
        }

        $lang = app()->getLocale();
$cityColumn = $lang == 'en' ? 'city_en' : 'city';

$cities = Hotel::all()->map(function($hotel) use ($lang){
    return $lang == 'en' && $hotel->city_en 
            ? $hotel->city_en 
            : $hotel->city;
    })->unique()->values();
        return view('home', compact('hotels', 'cities'));
    }
}
