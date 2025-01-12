<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminFAQController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


Route::get('/', [BookController::class, 'index'])->name('home');



Route::get('/FAQ', function(){
    return view('faq');
})->name('faq');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/news', function(){
    return view('news');
})->name('news');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profiles/{user}', [ProfileController::class, 'show'])->name('profile.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/search', function () {
    $username = request('username');
    $user = User::where('name', 'like', '%' . $username . '%')->first();

    if ($user) {
        return redirect()->route('profile.show', $user->id);
    } else {
        return redirect()->route('home')->with('error', 'User not found');
    }
})->name('search.username');

Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

Route::get('/user/{user}', [BookController::class, 'showProfile'])->name('profile.show');

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        if (Auth::user()->is_admin) {
            return view('admin.dashboard');
        }
        return redirect('/')->with('error', 'Access denied.');
    })->name('admin.dashboard');

    Route::prefix('admin/users')->name('admin.users.')->group(function () {
        Route::get('/', [AdminUsersController::class, 'index'])->name('index');
        Route::get('/{user}/edit', [AdminUsersController::class, 'edit'])->name('edit'); 
        Route::patch('/{user}', [AdminUsersController::class, 'update'])->name('update'); 
        Route::delete('/{user}', [AdminUsersController::class, 'destroy'])->name('destroy');
        Route::post('/', [AdminUsersController::class, 'store'])->name('store');
    });

    Route::prefix('admin/news')->name('admin.news.')->group(function () {
        Route::get('/', [AdminNewsController::class, 'index'])->name('index');
        Route::post('/', [AdminNewsController::class, 'store'])->name('store');
        Route::delete('/', [AdminNewsController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('admin/faq')->name('admin.faq.')->group(function () {
        Route::get('/', [AdminFAQController::class, 'index'])->name('index');
    });

    Route::prefix('admin/contacts')->name('admin.contacts.')->group(function () {
        Route::get('/', [AdminContactController::class, 'index'])->name('index');
    });
});


require __DIR__.'/auth.php';
