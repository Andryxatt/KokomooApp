<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Artist;
use App\MainContent;
use App\MainTitleLeft;
use App\NewsArtist;
use App\NewsContent;
use Illuminate\Http\Request;

class BlogController extends Controller
{
     public function index()
       {
           $maincont = MainContent::all();
           $leftCont = MainTitleLeft::all();
            return view('blog_pages.main',compact('maincont','leftCont'));
       }
    public function news($id, $request)
    {
        return view('blog_pages.news');
    }
    public function news_list()
    {
        $artists = Artist::all();
        $newss = NewsArtist::with('artist')->get();
        $contents = NewsContent::with('newsArtist')->get();
        return view('blog_pages.news_list', compact('artists','newss','contents' ));
    }
    public function newsInfo($id)
    {
        $newse = NewsArtist::where('news_id',$id)->get();
        $content = NewsContent::where("news_id", $id)->get();

        return view('blog_pages.news',compact('newse', 'content') );
    }
    public function agency_list()
    {
       $agency =  Agency::all();
        return view('blog_pages.agency_list',['agencys'=>$agency]);
    }
    public function artists_list()
    {
        return view('blog_pages.artists_list');
    }
}
