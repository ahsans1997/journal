<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(Request $request)
    {
        $journal_name = $request->search;
        if($journal_name != " "){
            return view('frontend.home',[
                'search_journals' => Journal::with(['user', 'department'])->where('journal_name', 'LIKE' , "%$journal_name%")->get(),
                'journals' => Journal::with(['user', 'department'])->get(),
            ]);
        }else{
            return view('frontend.home',[
                'journals' => Journal::with(['user', 'department'])->get(),
            ]);
        }

    }
}
