<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFAQController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $faqs = Faq::all();
        return view('admin.faq', compact('categories', 'faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $faq = Faq::create($request->only('question', 'answer'));
        $faq->categories()->attach($request->category_id);

        return redirect()->route('admin.faq.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($request->only('question', 'answer'));
        $faq->categories()->sync($request->category_id);

        return redirect()->route('admin.faq.index');
    }

    public function destroy($id)
    {
        Faq::destroy($id);
        return redirect()->route('admin.faq.index');
    }
}
