<?php

namespace App\Http\Controllers\API;


use App\NewsArtist;
use App\NewsContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class NewsArtistController extends Controller
{
    /**
     * @return NewsArtist[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $news = NewsArtist::all();
        $content = NewsContent::with('newsArtist')->get();
        return ['news'=>$news, 'content'=>$content];
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//
        $this->validate($request,[
           'category_english'=> 'required|string',
            'slug'=>'required|string'
       ]);
      $newsA =  NewsArtist::create([
            'author_name' =>$request['author_name'],
            'category_english' =>$request['category_english'],
            'category_china' =>$request['category_china'],
            'date_news'=>$request['date_news'],
           'slug'=>$request['slug']
        ]);
     
        $ArtNews = NewsArtist::orderBy('id', 'desc')->first();
            foreach($request->get('rows') as $news) {

                if($news['photo'] != null){
                    $name = time().'.' . explode('/', explode(':', substr($news['photo'], 0, strpos($news['photo'], ';')))[1])[1];
                    \Image::make($news['photo'])->save(public_path('img/newsContent/').$name);
                    $request->merge(['photo'=> $name]);
                    NewsContent::create ( [
                        'news_id'=> $ArtNews->id,
                        'photo'=>$name,
                        'photo_title'=>$news['photo_title'],
                        'text_china'=>$news['text_china'],
                        'text_english'=>$news['text_english']
                    ]);
                }
            }

        return ['message'=> 'Created news content'];
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        $update = [
            'author_name' => $request['author_name'],
            'category_china' => $request['category_china'],
            'category_english' => $request['category_english'],
            'date_news' => $request['date_news'],
            'slug'=>$request['slug']
        ];
        NewsArtist::where('id', $id)->update($update);

    if( $request['rows']!=null){
        $content = $request['rows'];

        if(count($content)>0)
        {
            for($i = 0; $i < count($content); $i++) {
                $news = NewsContent::where('content_id', $content[$i]['content_id'])->get();

                if($news[0]->photo != $content[$i]['photo'])
                {
                    $name = time() . '.' . explode('/', explode(':', substr($content[$i]['photo'], 0, strpos($content[$i]['photo'], ';')))[1])[1];
                    \Image::make($content[$i]['photo'])->save(public_path('img/newsContent/') . $name);
                    $request->merge(['photo' => $name]);
                    $upd =[
                        'news_id'=>$content[$i]['news_id'],
                        'photo'=>$name,
                        'photo_title'=>$content[$i]['photo_title'],
                        'text_china'=>$content[$i]['text_china'],
                        'text_english'=> $content[$i]['text_english']
                    ];

                }
                else {
                    $upd =[
                        'news_id'=>$content[$i]['news_id'],
                        'photo_title'=>$content[$i]['photo_title'],
                        'text_china'=>$content[$i]['text_china'],
                        'text_english'=> $content[$i]['text_english']
                    ];
                }
                NewsContent::where('content_id', $content[$i]['content_id'])->update($upd);
            }
        }
    }



    }




    /**
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        NewsContent::where('news_id', $id)->delete();
        NewsArtist::where('id', $id)->delete();

        //delete user
        return ['message' => 'News deleted'];
    }
}
