<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image; 

class AboutController extends Controller
{
    public function about()
    {
       $images = Image::all()->groupBy('section');

        $imgAbout = $images['about'][0]->path ?? null;
        $imgAdvantages = $images['advantages'][0]->path ?? null;
        $imgTeam = $images['team'][0]->path ?? null;

        return view('about', compact('imgAbout', 'imgAdvantages', 'imgTeam'));
    }
}