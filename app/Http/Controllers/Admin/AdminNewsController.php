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

    public function destroy(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $newsItem = News::where('title', $request->title)->first();

        if ($newsItem) {
            Storage::delete(str_replace('/storage', 'public', $newsItem->image));
            $newsItem->delete();
            return redirect()->route('admin.news.index')->with('success', 'News item deleted successfully.');
        } else {
            return redirect()->route('admin.news.index')->with('error', 'News item not found.');
        }
    }
}
