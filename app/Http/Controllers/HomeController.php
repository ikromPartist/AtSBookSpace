<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index() 
    {
        $popularBooks = Book::orderBy('likes', 'desc')
                                ->paginate(32);

        $newBooks = Book::latest()->paginate(48);

        return view('home_index', compact('popularBooks','newBooks'));
    }
}
