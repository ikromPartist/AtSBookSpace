<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function index(Request $request) 
    {
        if ($request->id) {
            $book = Book::where('id', $request->id)
                            ->first();

            return view('books_single', compact('book'));

        } else if ($request->category == 'available') {
            $books = Book::where('user_id', null)
                            ->orderBy('title', 'asc')
                            ->paginate(12);
    
            $category = 'available';
            return view('books_index', compact('books', 'category'));

        } else if ($request->category == 'all' || $request->category == null) {
            $books = Book::orderBy('title', 'asc')
                            ->paginate(12);
    
            $category = 'all';
            return view('books_index', compact('books', 'category'));
        } else {
            $books = Book::where('category', $request->category)
                            ->orderBy('title', 'asc')
                            ->paginate(12);
    
            $category = $request->category;
            return view('books_index', compact('books', 'category'));
        }

    }
    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $orderBy = $request->get('orderby');
            $orderType = $request->get('ordertype');
            $category = $request->get('category');
            if ($category == 'available') {
                $books = Book::where('user_id', null)
                                ->orderBy($orderBy, $orderType)
                                ->paginate(12);
        
                return view('books_data', compact('books'))->render();

            } else if ($category == 'all') {
                $books = Book::orderBy($orderBy, $orderType)
                                ->paginate(12);
        
                return view('books_data', compact('books'))->render();
            } else {
                $books = Book::where('category', $category)
                                ->orderBy($orderBy, $orderType)
                                ->paginate(12);
        
                return view('books_data', compact('books'))->render();
            } 
        }
    }
    public function books_view(Request $request)
    {
        if ($request->get('show') == 'standart') {
            session(['book_cards' => 'show']);
            session(['books_list' => 'hidden']);
            return 'standart';
        } else if ($request->get('show') == 'list') {
            session(['book_cards' => 'hidden']);
            session(['books_list' => 'show']);
            return 'list';
        }
    }

}
