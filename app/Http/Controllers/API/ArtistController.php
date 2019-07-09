<?php

namespace App\Http\Controllers\API;

use App\Artist;
use App\ArtistBio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
class ArtistController extends Controller
{
    /**
     * @return Artist[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $artists = Artist::all();
        $bio = ArtistBio::with('Artist')->get();
        return ['artists'=>$artists, 'bio'=>$bio];
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'full_name'=> 'required|string|max:100',
            'specialization'=> 'required|string',
            'slug'=>'required'
        ]);
        $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
        Image::make($request->image)->save(public_path('img/artist/').$name);
        $artist = Artist::create([
            'full_name' =>$request['full_name'],
            'specialization' =>$request['specialization'],
            'image' =>$name,
            'slug'=>$request['slug']
        ]);
        $artistLast = Artist::orderBy('artist_id', 'desc')->first();

        foreach($request->get('rows') as $news) {

            if($news['photo'] != null){

                $name = time().'.' . explode('/', explode(':', substr($news['photo'], 0, strpos($news['photo'], ';')))[1])[1];
                \Image::make($news['photo'])->save(public_path('img/ArtistBioPhoto/').$name);
                $request->merge(['photo'=> $name]);
                ArtistBio::create ( [
                    'artist_id'=>$artistLast->artist_id,
                    'photo'=>$name,
                    'text_china'=>$news['text_china'],
                    'text_english'=>$news['text_english']
                ]);
            }
        }

        return ['message'=> 'Created news content'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'full_name' => 'required|string|max:100',
            'specialization' => 'required|string',
            'slug' => 'required|string'
        ]);
        $artist = Artist::where('artist_id', $id)->get();

        $currentPhoto = $artist[0]->image;


        if($request->image != $currentPhoto) {
            $name = time() . '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            \Image::make($request->image)->save(public_path('img/artist/') . $name);
            $request->merge(['image' => $name]);
            $upd = [
                'full_name' => $request['full_name'],
                'specialization' => $request['specialization'],
                'image' => $request['image'],
                'slug' => $request['slug']
            ];


        } else {
            $upd = [
                'full_name' => $request['full_name'],
                'specialization' => $request['specialization'],
                'image' => $currentPhoto,
                'slug' => $request['slug']
            ];
        }
        Artist::where('artist_id', $id)->update($upd);
        if($request['rows'] != null) {
            $content = $request['rows'];

            if(count($content) > 0) {
                for($i = 0; $i < count($content); $i++) {
                    $news = ArtistBio::where('artist_bio_id', $content[$i]['artist_bio_id'])->get();

                    if($news[0]->photo != $content[$i]['photo']) {
                        $name = time() . '.' . explode('/', explode(':', substr($content[$i]['photo'], 0, strpos($content[$i]['photo'], ';')))[1])[1];
                        \Image::make($content[$i]['photo'])->save(public_path('img/ArtistBioPhoto/') . $name);
                        $request->merge(['photo' => $name]);
                        $upd = [
                            'artist_id' => $content[$i]['artist_id'],
                            'photo' => $name,
                            'text_china' => $content[$i]['text_china'],
                            'text_english' => $content[$i]['text_english']
                        ];

                    } else {
                        $upd = [
                            'artist_id' => $content[$i]['artist_id'],
                            'photo' => $content[$i]['photo'],
                            'text_china' => $content[$i]['text_china'],
                            'text_english' => $content[$i]['text_english']
                        ];
                    }
                    ArtistBio::where('artist_bio_id', $content[$i]['artist_bio_id'])->update($upd);
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
        $artist = Artist::where('artist_id', $id)->delete();

        return ['message' => 'Artist deleted'];
    }
}
