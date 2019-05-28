<?php

namespace App\Http\Controllers\API;

use App\Artist;
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
        return Artist::all();
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
            'date_birthday'=> 'required|',
            'slug'=>'required'
        ]);
        $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
        Image::make($request->image)->save(public_path('img/artist/').$name);
        return Artist::create([
            'full_name' =>$request['full_name'],
            'specialization' =>$request['specialization'],
            'date_birthday' =>$request['date_birthday'],
            'image' =>$name,
            'slug'=>$request['slug']
        ]);
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
            'slug'=>'required|string'
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
                'slug'=>$request['slug']
            ];


        } else {
            $upd = [
                'full_name' => $request['full_name'],
                'specialization' => $request['specialization'],
                'image' => $currentPhoto,
                'slug'=>$request['slug']
            ];
        }
        Artist::where('artist_id', $id)->update($upd);
    }

    /**
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        $artist = Artist::findOrFail($id);
        //delete user
        $artist->delete();
        return ['message' => 'Artist deleted'];
    }
}
