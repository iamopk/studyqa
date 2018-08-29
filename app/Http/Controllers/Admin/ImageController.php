<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::query()->orderBy('id', 'desc')->paginate(10);

        return view('admin.gallery.index', ['images' => $images]);
    }

    public function create()
    {
        $this->authorize('create', Image::class);
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Image::class);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $path = $request->file('file')->store('images', 'public');

        Image::query()->create([
            'name' => $request->name,
            'url' => $path,
        ]);

        return redirect(route('admin.images'));
    }

    public function destroy($id)
    {
        $this->authorize('destroy', Image::class);

        $image = Image::query()->findOrFail($id);

        $image->delete();

        return redirect(route('admin.images'));
    }
}
