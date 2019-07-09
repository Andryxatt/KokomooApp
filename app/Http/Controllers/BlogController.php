<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Artist;
use App\ArtistBio;
use App\MainContent;
use App\MainTitleLeft;
use App\NewsArtist;
use App\NewsContent;

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

    public function news_list()
    {
        $newss = NewsArtist::paginate(5);
        $contents = NewsContent::with('newsArtist')->get();
        return view('blog_pages.news_list', compact('newss','contents' ));
    }
    public function newsInfo($slug)
    {
        $newse = NewsArtist::where('slug',$slug)->firstOrFail();
        $topNews = NewsArtist::orderBy('date_news')->take(3)->get();
        $content = NewsContent::where("news_id",'LIKE', $newse->id)->get();
        return view('blog_pages.news',compact('newse', 'content','topNews') );
    }
    public function agency_list()
    {
       $agency =  Agency::all();
        return view('blog_pages.agency_list',['agencys'=>$agency]);
    }
    public function artists_list(Request $request)
    {
        if(isset($request->sort)){
            $allArt = Artist::has('ArtistBios')->orderBy('full_name', 'ASC')->get();
        }
        else {
            $allArt = Artist::has('ArtistBios')->orderBy('artist_id', 'DESC')->get();
        }
        $artists = Artist::has('ArtistBios','>',0)->paginate(5);
        $artBio = ArtistBio::all();

        return view('blog_pages.artists_list',compact('artists','artBio','allArt'));
    }

    public function artist_news($id)
    {
        $artist = Artist::where('artist_id',$id)->get();

        $topNews = NewsArtist::orderBy('date_news')->take(3)->get();
        $bios = ArtistBio::where('artist_id', 'LIKE', $id)->get();

        return view('blog_pages.artist_news',compact('topNews', 'artist', 'bios'));
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
