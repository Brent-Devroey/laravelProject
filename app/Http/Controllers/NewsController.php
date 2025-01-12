<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = News::orderBy('created_at', 'desc')->get();
        return view('news', compact('newsItems'));
    }
}
