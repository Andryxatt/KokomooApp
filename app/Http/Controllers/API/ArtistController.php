<?php

namespace App\Http\Controllers\API;

use App\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'date_birthday'=> 'required|'
        ]);
        return Artist::create([
            'full_name' =>$request['full_name'],
            'specialization' =>$request['specialization'],
            'date_birthday' =>$request['date_birthday'],

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
        $artist = Artist::where('artist_id',$id);
        $this->validate($request,[
            'full_name'=> 'required|string|max:100',
            'specialization'=> 'required|string',
            'date_birthday'=> 'required|'
        ]);
        $artist->update($request->all());

        return ['message'=> 'Updated user info'];
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
