<?php

namespace App\Http\Controllers;

use App\Artist;
use App\NewsArtist;
use App\NewsContent;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function index()
    {
        return view('blog_pages.news_search');
    }

    function search(Request $request)
    {

        $query = $request->get('query');
//dd($query);
            if($query != '')
            {
                $newss = NewsArtist::where('category_english', 'like', '%'.$query.'%')
                    ->orWhere('category_china', 'like', '%'.$query.'%')
                    ->orderBy('artist_id', 'desc')->paginate(2);;
            }
            else
            {
                $newss = NewsArtist::paginate(2);
            }


        return view('blog_pages.news_search', compact('newss'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


}
