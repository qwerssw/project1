<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
   public function index()
    {
        $images = Image::all()->groupBy('section'); 
        return view('image', compact('images'));
    }
}
