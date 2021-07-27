<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Company;

class RatingController extends Controller
{
    public function index()
    {
        $mstActRdrs = User::withCount('taken_books')
                                    ->orderBy('read_pages', 'desc')
                                    ->paginate(12);

        $mstRdngCmpnys = null;

        $mstDscplndRdrs = null;

        $mstPplrBooks = null;

        $mstPrctvMmbrs = null;

        $rank = $mstActRdrs->firstItem();

        return view('rating_index', compact('rank', 'mstActRdrs', 'mstRdngCmpnys', 'mstDscplndRdrs', 'mstPplrBooks', 'mstPrctvMmbrs'));
    }
    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $type = $request->type;
            //! the most popular reader
            if ($type == 'most_active_reader') {
                $mstActRdrs = User::withCount('taken_books')
                                    ->orderBy('read_pages', 'desc')
                                    ->paginate(12);

                $mstRdngCmpnys = null;
                
                $mstDscplndRdrs = null;

                $mstPplrBooks = null;

                $mstPrctvMmbrs = null;

                $rank = $mstActRdrs->firstItem();

                return view('rating_data', compact('rank','mstActRdrs', 'mstRdngCmpnys', 'mstDscplndRdrs', 'mstPplrBooks', 'mstPrctvMmbrs'))->render();
            }
            //! the most reading company
            else if ($type == 'most_reading_company') {
                $mstActRdrs = null;
                
                $mstRdngCmpnys = Company::withCount('employees')
                                ->orderBy('read_pages', 'desc')
                                ->paginate(12);

                $mstDscplndRdrs = null;

                $mstPplrBooks = null;

                $mstPrctvMmbrs = null;

                $rank = $mstRdngCmpnys->firstItem();

                return view('rating_data', compact('rank', 'mstActRdrs', 'mstRdngCmpnys', 'mstDscplndRdrs', 'mstPplrBooks', 'mstPrctvMmbrs'))->render();
            }
            //! the most disciplined reader 
            else if ($type == 'most_disciplined_reader') {
                $mstActRdrs = null;
                
                $mstRdngCmpnys = null;

                $mstDscplndRdrs = User::orderBy('blacklist_value', 'asc')
                                        ->orderBy('renewed_deadlines', 'asc')
                                        ->paginate(12);

                $mstPplrBooks = null;

                $mstPrctvMmbrs = null;

                $rank = $mstDscplndRdrs->firstItem();

                return view('rating_data', compact('rank', 'mstActRdrs', 'mstRdngCmpnys', 'mstDscplndRdrs', 'mstPplrBooks', 'mstPrctvMmbrs'))->render();
            }
            //! the most popular book
            else if ($type == 'most_popular_book') {
                $mstActRdrs = null;
                
                $mstRdngCmpnys = null;

                $mstDscplndRdrs = null;

                $mstPplrBooks = Book::withCount('likes')
                                        ->withCount('comments')
                                        ->orderBy('likes_count', 'desc')
                                        ->orderBy('comments_count', 'desc')
                                        ->paginate(12);

                $mstPrctvMmbrs = null;

                $rank = $mstPplrBooks->firstItem();

                return view('rating_data', compact('rank', 'mstActRdrs', 'mstRdngCmpnys', 'mstDscplndRdrs', 'mstPplrBooks', 'mstPrctvMmbrs'))->render();
            }
            //! the most proactive member
            else if ($type == 'most_proactive_member') {
                $mstActRdrs = null;
                
                $mstRdngCmpnys = null;

                $mstDscplndRdrs = null;

                $mstPplrBooks = null;

                $mstPrctvMmbrs = User::paginate(12);

                $rank = $mstPrctvMmbrs->firstItem();

                return view('rating_data', compact('rank', 'mstActRdrs', 'mstRdngCmpnys', 'mstDscplndRdrs', 'mstPplrBooks', 'mstPrctvMmbrs'))->render();
            }
        } 
    }
}
