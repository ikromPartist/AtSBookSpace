<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Like;
use App\Models\Dislike;
use App\Models\Comment;
use App\Models\Rating;
use Carbon\Carbon;

class BooksController extends Controller
{
    public function index(Request $request) 
    {
        if ($request->id) {
            $book = Book::withCount('comments')
                            ->withCount('likes')
                            ->withCount('dislikes')
                            ->withCount('ratings')
                            ->where('id', $request->id)
                            ->first();
            
            $comments = Comment::where('book_id', $request->id)
                                    ->latest()
                                    ->get();

            return view('books_single', compact('book', 'comments'));

        } else if ($request->category == 'available') {
            $books = Book::withCount('comments')
                            ->withCount('likes')
                            ->withCount('dislikes')
                            ->withCount('ratings')
                            ->where('user_id', null)
                            ->orderBy('title', 'asc')
                            ->paginate(12);
    
            $category = 'available';
            return view('books_index', compact('books', 'category'));

        } else if ($request->category == 'all' || $request->category == null) {
            $books = Book::withCount('comments')
                            ->withCount('likes')
                            ->withCount('dislikes')
                            ->withCount('ratings')
                            ->orderBy('title', 'asc')
                            ->paginate(12);
    
            $category = 'all';
            return view('books_index', compact('books', 'category'));
        } else {
            $books = Book::withCount('comments')
                            ->withCount('likes')
                            ->withCount('dislikes')
                            ->withCount('ratings')
                            ->where('category', $request->category)
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
                $books = Book::withCount('comments')
                                ->withCount('likes')
                                ->withCount('dislikes')
                                ->withCount('ratings')
                                ->where('user_id', null)
                                ->orderBy($orderBy, $orderType)
                                ->paginate(12);
        
                return view('books_data', compact('books'))->render();

            } else if ($category == 'all') {
                $books = Book::withCount('comments')
                                ->withCount('likes')
                                ->withCount('dislikes')
                                ->withCount('ratings')
                                ->orderBy($orderBy, $orderType)
                                ->paginate(12);
        
                return view('books_data', compact('books'))->render();
            } else {
                $books = Book::withCount('comments')
                                ->withCount('likes')
                                ->withCount('dislikes')
                                ->withCount('ratings')
                                ->where('category', $category)
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
    public function deadline_renewed(Request $request) 
    {
        $book = Book::find($request->book);

        if ($book->deadline_renewed) {
            return true;
        } else {

            $book->deadline_renewed = true;
            $book->return_date = Carbon::parse($book->return_date)->addDays(15);
            $book->available_date = Carbon::parse($book->available_date)->addDays(15);
            $book->save();
            
            return false;
        }
    }
    public function likes(Request $request)
    {
        $userId = session()->get('loggedUser');
        if ($request->like == 'not-liked') {
            // save like
            $like = new Like;
            $like->user_id = $userId;
            $like->book_id = $request->book;
            $like->save();
            // delete dislike if exist
            Dislike::where('user_id', $userId)
                        ->where('book_id', $request->book)
                        ->delete();

            return 'liked';
        } 
        else if ($request->like == 'not-disliked') {
            // save dislike
            $dislike = new Dislike;
            $dislike->user_id = $userId;
            $dislike->book_id = $request->book;
            $dislike->save();
            // delete like if exists 
            Like::where('user_id', $userId)
                        ->where('book_id', $request->book)
                        ->delete();

            return 'disliked';
        }
    }
    public function comments(Request $request)
    {
        $userId = session()->get('loggedUser');

        $comment = new Comment;
        $comment->user_id = $userId;
        $comment->book_id = $request->book;
        $comment->comment = $request->comment;
        $comment->save();
        return 'comment added successfully';
    }
    public function ratings(Request $request) 
    {
        $userId = session()->get('loggedUser');
        // delete previous rating
        Rating::where('user_id', $userId)
            ->where('book_id', $request->book)
            ->delete();
        // save new rating rate
        $rating = new Rating;
        $rating->user_id = $userId;
        $rating->book_id = $request->book;
        $rating->rate = $request->rate;
        $rating->save();

        return 'rate saved';
    }

}
