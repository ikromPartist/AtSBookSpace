<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function index() 
    {
        $books = Book::orderBy('id', 'asc')
                        ->paginate(10);

        return view('books_index', compact('books'));
    }
    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $sortBy = $request->get('sortby');
            $sortType =$request->get('sorttype');
            $books = Book::orderBy($sortBy, $sortType)
                            ->paginate(10);

            return view('pagination_data', compact('books'))->render();
        }
    }
}
