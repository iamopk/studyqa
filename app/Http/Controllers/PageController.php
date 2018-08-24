<?php

namespace App\Http\Controllers;

use App\Page;

class PageController extends Controller
{
    public function index()
    {
        return view('home', ['page' => Page::query()->findOrFail(1)]);
    }
}
