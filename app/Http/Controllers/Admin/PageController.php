<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function edit($id)
    {
        $this->authorize('edit', Page::class);
        $page = Page::query()->findOrFail(1);
        return view('admin.page', ['page' => $page]);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit', Page::class);

        $this->validate($request, [
            'title' => 'required|string|max:255',
            'text' => 'required',
        ]);

        /** @var Page $page */
        $page = Page::query()->findOrFail($id);

        if ($request->title) {
            $page->title = $request->title;
        }

        if ($request->text) {
            $page->text = $request->text;
        }

        $page->update([
            'title' => $page->title,
            'text' => $page->text,
        ]);

        return redirect(route('home'));
    }
}
