<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

class RatingController extends Controller
{
    public function index()
    {
        $mstActRdrs = User::withCount('taken_books')
                                    ->orderBy('read_pages', 'desc')
                                    ->paginate(12);

        $mstRdngCmpny = null;

        return view('rating_index', compact('mstActRdrs', 'mstRdngCmpny'));
    }
    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $type = $request->type;

            if ($type == 'most_active_reader') {
                $mstActRdrs = User::withCount('taken_books')
                                    ->orderBy('read_pages', 'desc')
                                    ->paginate(12);

                $mstRdngCmpny = null;
                
                return view('rating_data', compact('mstActRdrs', 'mstRdngCmpny'))->render();
            }
            else if ($type == 'most_reading_company') {
                $mstActRdrs = null;
                
                $mstRdngCmpny = Company::withCount('employees')
                                ->orderBy('read_pages', 'desc')
                                ->paginate(12);

                return view('rating_data', compact('mstActRdrs', 'mstRdngCmpny'))->render();
            }
        } 
    }
}
