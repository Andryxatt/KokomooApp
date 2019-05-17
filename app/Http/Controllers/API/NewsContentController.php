<?php

namespace App\Http\Controllers\API;

use App\NewsArtist;
use App\NewsContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsContentController extends Controller
{
    /**
     * @return array
     */
    public function index()
    {
        return NewsContent::with('newsArtist')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function show($id)
    {

        $content = NewsContent::where('news_id','LIKE',$id)->get();

       return  ['content'=>$content];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mainCont = NewsContent::where('content_id',$id);

        $mainCont->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
