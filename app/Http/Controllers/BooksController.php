<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function index() 
    {

        $books = Book::orderBy('title', 'asc')
                        ->paginate(12);

        return view('books_index', compact('books'));
    }
    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $orderBy = $request->get('orderby');
            $orderType =$request->get('ordertype');
            $books = Book::orderBy($orderBy, $orderType)
                            ->paginate(12);

            return view('books_data', compact('books'))->render();
        }
    }
}
