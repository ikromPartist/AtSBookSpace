<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookedBook;
use App\Models\Like;
use App\Models\Dislike;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;

class BooksController extends Controller
{
    public function index(Request $request) 
    {
        if ($request->category == 'available') 
        {
            $books = Book::withCount('comments')
                            ->withCount('likes')
                            ->withCount('dislikes')
                            ->withCount('ratings')
                            ->withCount('queues')
                            ->where('user_id', null)
                            ->orderBy('title', 'asc')
                            ->paginate(12);
    
            $category = 'available';
            $rank = $books->firstItem();

            return view('books.index', compact('books', 'category', 'rank'));
        } 
        else if ($request->category == 'all' || $request->category == null) 
        {
            $books = Book::withCount('comments')
                            ->withCount('likes')
                            ->withCount('dislikes')
                            ->withCount('ratings')
                            ->withCount('queues')
                            ->orderBy('title', 'asc')
                            ->paginate(12);
    
            $category = 'all';
            $rank = $books->firstItem();

            return view('books.index', compact('books', 'category', 'rank'));
        } 
        else 
        {
            $books = Book::withCount('comments')
                            ->withCount('likes')
                            ->withCount('dislikes')
                            ->withCount('ratings')
                            ->withCount('queues')
                            ->where('category', $request->category)
                            ->orderBy('title', 'asc')
                            ->paginate(12);
    
            $category = $request->category;
            $rank = $books->firstItem();

            return view('books.index', compact('books', 'category', 'rank'));
        }

    }

    public function single($id)
    {
        $book = Book::withCount('comments')
                        ->withCount('likes')
                        ->withCount('dislikes')
                        ->withCount('ratings')
                        ->withCount('queues')
                        ->where('id', $id)
                        ->first();
            
        $comments = Comment::where('book_id', $id)
                                ->latest()
                                ->get();

        return view('books.single', compact('book', 'comments'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) 
        {
            $orderBy = $request->get('orderby');
            $orderType = $request->get('ordertype');
            $category = $request->get('category');

            if ($category == 'available') 
            {
                $books = Book::withCount('comments')
                                ->withCount('likes')
                                ->withCount('dislikes')
                                ->withCount('ratings')
                                ->withCount('queues')
                                ->where('user_id', null)
                                ->orderBy($orderBy, $orderType)
                                ->paginate(12);

                $rank = $books->firstItem();
        
                return view('books.data', compact('books', 'rank'))->render();

            } 
            else if ($category == 'all') 
            {
                $books = Book::withCount('comments')
                                ->withCount('likes')
                                ->withCount('dislikes')
                                ->withCount('ratings')
                                ->withCount('queues')
                                ->orderBy($orderBy, $orderType)
                                ->paginate(12);

                $rank = $books->firstItem();
        
                return view('books.data', compact('books', 'rank'))->render();
            } 
            else 
            {
                $books = Book::withCount('comments')
                                ->withCount('likes')
                                ->withCount('dislikes')
                                ->withCount('ratings')
                                ->withCount('queues')
                                ->where('category', $category)
                                ->orderBy($orderBy, $orderType)
                                ->paginate(12);

                $rank = $books->firstItem();

                return view('books.data', compact('books', 'rank'))->render();
            } 
        }
    }

    public function viewType(Request $request)
    {
        if ($request->get('show') == 'standart') 
        {
            session(['book_cards' => 'show']);
            session(['books_list' => 'hidden']);
            return 'standart';
        } 
        else if ($request->get('show') == 'list') 
        {
            session(['book_cards' => 'hidden']);
            session(['books_list' => 'show']);
            return 'list';
        }
    }

    public function extendDeadline(Request $request) 
    {
        $book = Book::find($request->book);
        
        if ($book->deadline_renewed) 
        {
            return true;
        } 
        else 
        {
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
        // Store user's like when user has not liked before
        if ($request->like == 'not-liked') 
        {
            // Store like
            $like = new Like;
            $like->user_id = $userId;
            $like->book_id = $request->book;
            $like->save();
            // Delete dislike if exists
            Dislike::where('user_id', $userId)
                        ->where('book_id', $request->book)
                        ->delete();

            return 'liked';
        }
        // Store user's dislike when user has not disliked before 
        else if ($request->like == 'not-disliked') 
        {
            // Store dislike
            $dislike = new Dislike;
            $dislike->user_id = $userId;
            $dislike->book_id = $request->book;
            $dislike->save();
            // Delete like if exists 
            Like::where('user_id', $userId)
                        ->where('book_id', $request->book)
                        ->delete();

            return 'disliked';
        }
    }

    public function comments(Request $request)
    {
        $userId = session()->get('loggedUser');
        // Store user's comment
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
        // Delete previous rating if exists
        Rating::where('user_id', $userId)
            ->where('book_id', $request->book)
            ->delete();
        // Store new rating table
        $rating = new Rating;
        $rating->user_id = $userId;
        $rating->book_id = $request->book;
        $rating->rate = $request->rate;
        $rating->save();
        // Update book's rating
        $ratings = Rating::where('book_id', $request->book)
                            ->get();

        $rates = 0;
        $bookRating = 0;

        foreach ($ratings as $rating) {
            $rates = $rates + $rating->rate;
        }

        $bookRating = $rates / count($ratings);

        $book = Book::find($request->book);
        $book->rating = $bookRating;
        $book->save();

        return 'rate saved';
    }

    public function booking(Request $request)
    {
        // Get book
        $book = Book::select('id', 'user_id', 'return_date')
                        ->withCount('queues')
                        ->find($request->get('book'));
        // Get logged user
        $user = User::select('id')
                        ->withCount('booked_books')
                        ->find(session()->get('loggedUser'));

        if ($user->booked_books_count == 2)
        {
            return 'failed';
        }
        else 
        {
            $bookedBook = new BookedBook;
            $bookedBook->user_id = $user->id;
            $bookedBook->book_id = $book->id;
            $bookedBook->save();

            $date = null;
            if ($book->return_date)
            {
                $returnDate = Carbon::parse($book->return_date);
                $date = $returnDate->addDays(30 * ($book->queues_count + 1));
            }
            else 
            {
                $date = Carbon::now()->addDays(30 * ($book->queues_count + 1));
            }

            return $date->format('d/m');
        }
    }
}