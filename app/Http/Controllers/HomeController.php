<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index() 
    {
        $popularBooks = Book::select('id', 'title', 'img', 'author', 'pages')
                                ->withCount('likes')
                                ->orderBy('likes_count', 'desc')
                                ->paginate(32);

        $newBooks = Book::select('id', 'user_id', 'img', 'title', 'author', 'pages', 'rating', 'return_date')
                            ->withcount('comments')
                            ->withCount('ratings')
                            ->withCount('queues')
                            ->latest()
                            ->paginate(48);

        return view('pages.home.index', compact('popularBooks','newBooks'));
    }
}
