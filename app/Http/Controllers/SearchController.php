<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\City;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Поиск отелей
     */
    public function search(Request $request)
    {
        $query = Hotel::query()->with('images');
        
        // Поиск по названию или городу
        if ($request->filled('q')) {
            $searchTerm = $request->q;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('city', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }
        
        // Фильтр по городу
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }
        
        // Фильтр по цене
        if ($request->filled('min_price')) {
            $query->where('price_per_night', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price_per_night', '<=', $request->max_price);
        }
        
        // Фильтр по звездам
        if ($request->filled('stars')) {
            $query->whereIn('stars', $request->stars);
        }
        
        // Фильтр по удобствам
        if ($request->filled('amenities')) {
            $query->whereHas('amenities', function($q) use ($request) {
                $q->whereIn('amenities.id', $request->amenities);
            }, '=', count($request->amenities));
        }
        
        // Проверка доступности на даты
        if ($request->filled('check_in') && $request->filled('check_out')) {
            $query->whereDoesntHave('bookings', function($q) use ($request) {
                $q->where('status', '!=', 'cancelled')
                  ->where(function($query) use ($request) {
                      $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                            ->orWhereBetween('check_out', [$request->check_in, $request->check_out]);
                  });
            });
        }
        
        // Сортировка
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price_per_night', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price_per_night', 'desc');
                break;
            case 'rating_desc':
                $query->withAvg('comments', 'rating')
                      ->orderBy('comments_avg_rating', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }
        
        $hotels = $query->paginate(12)->withQueryString();
        
        // Получаем список городов для фильтра
        $cities = Hotel::select('city')
            ->distinct()
            ->orderBy('city')
            ->pluck('city');
        
        // Получаем все удобства
        $amenities = \App\Models\Amenity::all();
        
        if ($request->ajax()) {
            return view('search.results', compact('hotels'))->render();
        }
        
        return view('search.index', compact('hotels', 'cities', 'amenities'));
    }
    
    /**
     * Поиск городов (автодополнение)
     */
    public function cities(Request $request)
    {
        $term = $request->get('term');
        
        $cities = Hotel::where('city', 'like', "%{$term}%")
            ->distinct()
            ->limit(10)
            ->pluck('city');
        
        return response()->json($cities);
    }
    
    /**
     * Расширенный поиск
     */
    public function advanced()
    {
        $cities = Hotel::select('city')
            ->distinct()
            ->orderBy('city')
            ->pluck('city');
            
        $amenities = \App\Models\Amenity::all();
        
        $priceRange = [
            'min' => Hotel::min('price_per_night'),
            'max' => Hotel::max('price_per_night')
        ];
        
        return view('search.advanced', compact('cities', 'amenities', 'priceRange'));
    }
    
    /**
     * Сохранить поиск
     */
    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'criteria' => 'required|array'
        ]);
        
        auth()->user()->savedSearches()->create([
            'name' => $validated['name'],
            'criteria' => json_encode($validated['criteria'])
        ]);
        
        return response()->json(['success' => true]);
    }
}