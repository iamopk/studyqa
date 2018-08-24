<?php

namespace App\Http\Controllers;

use App\Image;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::query()->orderBy('id', 'desc')->get();
        return view('images.gallery', ['images' => $images]);
    }
}
