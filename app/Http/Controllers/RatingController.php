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
        $mstActRdrs = User::select('id', 'company_id','name', 'surname', 'read_pages')
                            ->withCount('taken_books')
                            ->orderBy('read_pages', 'desc')
                            ->paginate(12);

        $mstRdngCmpnys = null;
        $mstDscplndRdrs = null;
        $mstPplrBooks = null;
        $mstPrctvMmbrs = null;
        $rank = $mstActRdrs->firstItem();

        return view('rating.index', compact('rank', 'mstActRdrs', 'mstRdngCmpnys', 'mstDscplndRdrs', 'mstPplrBooks', 'mstPrctvMmbrs'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) 
        {
            $type = $request->type;
            // The most popular reader
            if ($type == 'most_active_reader') 
            {
                $mstActRdrs = User::select('id', 'company_id', 'name', 'surname', 'read_pages')
                                    ->withCount('taken_books')
                                    ->orderBy('read_pages', 'desc')
                                    ->paginate(12);

                $mstRdngCmpnys = null;
                
                $mstDscplndRdrs = null;

                $mstPplrBooks = null;

                $mstPrctvMmbrs = null;

                $rank = $mstActRdrs->firstItem();

                return view('rating.data', compact('rank','mstActRdrs', 'mstRdngCmpnys', 'mstDscplndRdrs', 'mstPplrBooks', 'mstPrctvMmbrs'))->render();
            }
            // The most reading company
            else if ($type == 'most_reading_company') 
            {
                $mstActRdrs = null;
                
                $mstRdngCmpnys = Company::select('id', 'name', 'read_pages', 'read_books')
                                            ->withCount('employees')
                                            ->orderBy('read_pages', 'desc')
                                            ->paginate(12);

                $mstDscplndRdrs = null;
                $mstPplrBooks = null;
                $mstPrctvMmbrs = null;
                $rank = $mstRdngCmpnys->firstItem();

                return view('rating.data', compact('rank', 'mstActRdrs', 'mstRdngCmpnys', 'mstDscplndRdrs', 'mstPplrBooks', 'mstPrctvMmbrs'))->render();
            }
            // The most disciplined reader 
            else if ($type == 'most_disciplined_reader') 
            {
                $mstActRdrs = null;
                $mstRdngCmpnys = null;

                $mstDscplndRdrs = User::select('id', 'company_id', 'name', 'surname', 'blacklist_value', 'renewed_deadlines')
                                        ->orderBy('blacklist_value', 'asc')
                                        ->orderBy('renewed_deadlines', 'asc')
                                        ->paginate(12);

                $mstPplrBooks = null;
                $mstPrctvMmbrs = null;
                $rank = $mstDscplndRdrs->firstItem();

                return view('rating.data', compact('rank', 'mstActRdrs', 'mstRdngCmpnys', 'mstDscplndRdrs', 'mstPplrBooks', 'mstPrctvMmbrs'))->render();
            }
            // The most popular book
            else if ($type == 'most_popular_book') 
            {
                $mstActRdrs = null;
                $mstRdngCmpnys = null;
                $mstDscplndRdrs = null;

                $mstPplrBooks = Book::select('id', 'title', 'author')
                                        ->withCount('likes')
                                        ->withCount('comments')
                                        ->orderBy('likes_count', 'desc')
                                        ->orderBy('comments_count', 'desc')
                                        ->paginate(12);

                $mstPrctvMmbrs = null;
                $rank = $mstPplrBooks->firstItem();

                return view('rating.data', compact('rank', 'mstActRdrs', 'mstRdngCmpnys', 'mstDscplndRdrs', 'mstPplrBooks', 'mstPrctvMmbrs'))->render();
            }
            // The most proactive member
            else if ($type == 'most_proactive_member') 
            {
                $mstActRdrs = null;
                $mstRdngCmpnys = null;
                $mstDscplndRdrs = null;
                $mstPplrBooks = null;

                $mstPrctvMmbrs = User::select('id', 'company_id', 'name', 'surname')
                                        ->withCount('presentations')
                                        ->withCount('participations')
                                        ->orderBy('presentations_count', 'desc')
                                        ->orderBy('participations_count', 'desc')    
                                        ->paginate(12);

                $rank = $mstPrctvMmbrs->firstItem();

                return view('rating.data', compact('rank', 'mstActRdrs', 'mstRdngCmpnys', 'mstDscplndRdrs', 'mstPplrBooks', 'mstPrctvMmbrs'))->render();
            }
        } 
    }
}
