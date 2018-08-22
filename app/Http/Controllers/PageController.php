<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home', ['page' => Page::findOrFail(1)]);
    }
}
