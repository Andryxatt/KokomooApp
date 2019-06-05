<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Artist;
use App\MainContent;
use App\MainTitleLeft;
use App\NewsArtist;
use App\NewsContent;
use http\Env\Response;
use DB;
use Illuminate\Http\Request;
use Spatie\Newsletter\NewsletterFacade as Newsletter;
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
        $artists = Artist::with('newsArtist');
        $newss = NewsArtist::with('artist')->paginate(5);
        $contents = NewsContent::with('newsArtist')->get();
        $topNews = NewsArtist::orderBy('date_news')->take(3)->get();

        return view('blog_pages.news_list', compact('artists','newss','contents','topNews' ));
    }
    public function newsInfo($slug)
    {
        $newse = NewsArtist::where('slug',$slug)->get();

        $content = NewsContent::where("news_id", $newse[0]->news_id)->get();

        return view('blog_pages.news',compact('newse', 'content') );
    }
    public function agency_list()
    {
       $agency =  Agency::all();
        return view('blog_pages.agency_list',['agencys'=>$agency]);
    }
    public function artists_list()
    {
        $artists = Artist::has('newsArtist','>',0)->paginate(5);

        return view('blog_pages.artists_list',compact('artists'));
    }

    public function artist_news($slug)
    {
        $artist = Artist::where('slug',$slug)->get();

        $newse = NewsArtist::where("artist_id", $artist[0]->artist_id)->get();

        return view('blog_pages.artist_news',['newse'=>$newse, 'artist'=>$artist] );
    }
    public function mailChim(Request $request)
    {

        if ( ! Newsletter::isSubscribed($request->email) ) {
            Newsletter::subscribe($request->email);
           echo 1;
        }else {
            echo 0;
        }
    }
}
