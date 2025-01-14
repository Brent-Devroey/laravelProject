<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;


class AdminNewsController extends Controller
{
    public function index()
    {
        $newsItems = News::orderBy('created_at', 'desc')->get();
        return view('admin.news', compact('newsItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News item created successfully.');
    }

    public function update(Request $request, News $news)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        if ($news->image) {
            Storage::delete('public/' . $news->image);
        }
        $news->image = $imagePath;
    }

    // Update the rest of the fields
    $news->update($request->only('title', 'content'));

    return redirect()->route('admin.news.index')->with('success', 'News item updated successfully.');
}

public function destroy(News $news)
{
    if ($news->image) {
        Storage::delete('public/' . $news->image);
    }

    $news->delete();

    return redirect()->route('admin.news.index')->with('success', 'News item deleted successfully.');
}
}
