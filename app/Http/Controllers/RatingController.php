<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RatingController extends Controller
{
    public function index()
    {
        $mstActRdrs = User::orderBy('read_pages', 'desc')
                                    ->paginate(12);

        return view('rating_index', compact('mstActRdrs'));
    }
    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $type = $request->type;

            if ($type == 'most_active_reader') {
                $mstActRdrs = User::orderBy('read_pages', 'desc')
                                    ->paginate(12);
                
                return view('rating_data', compact('mstActRdrs'))->render();
            }
            else if ($type == 'most_reading_company') {
                $mstRdngCmpny = User::orderBy('read_pages', 'desc')
                                    ->paginate(12);
                
                return view('rating_data', compact('mstActRdrs'))->render();
            }
        } 
    }
}
