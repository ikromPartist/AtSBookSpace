<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index() 
    {
        $popularBooks = Book::withCount('comments')
                                ->withCount('likes')
                                ->orderBy('likes_count', 'desc')
                                ->paginate(32);

        $newBooks = Book::withcount('comments')
                            ->withCount('ratings')
                            ->latest()
                            ->paginate(48);

        return view('home.index', compact('popularBooks','newBooks'));
    }
}
