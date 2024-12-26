<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class BookController extends Controller
{

    public function index()
    {
        $books = Book::where('user_id', auth()->id())->get();

        return view('home', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Book::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'rating' => $validated['rating'],
            'image' => $imagePath,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('home')->with('success', 'Book added successfully to your library!');
    }

        public function destroy(Book $book)
    {
        if ($book->image) {
            Storage::delete('public/' . $book->image);
        }
        $book->delete();
        return redirect()->route('home')->with('success', 'Book deleted successfully!');
    }
        public function showProfile(User $user)
    {
        $recentBook = Book::where('user_id', $user->id)
                          ->orderBy('created_at', 'desc')
                          ->first();
    
        return view('profile', compact('user', 'recentBook'));
    }
    
}
