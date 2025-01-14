<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $categories = Category::with('faqs')->get(); 
        return view('faq', compact('categories'));
    }
}
