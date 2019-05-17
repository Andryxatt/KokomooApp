<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MainTitleLeft;


class MainTitleLeftController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return MainTitleLeft[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return MainTitleLeft::all();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'english_text'=> 'required|string|max:191',
            'china_text'=> 'required|string|max:191',
        ]);
        return MainTitleLeft::create([
           'english_text' =>$request['english_text'],
            'china_text' =>$request['china_text'],

        ]);
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
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'english_text'=> 'required|string|max:191',
            'china_text'=> 'required|string|max:191',
        ]);
        $mainT = MainTitleLeft::where('main_title_id',$id);

        $mainT->update($request->all());

        return ['message'=> 'Updated user info'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mainT = MainTitleLeft::findOrFail($id);
        //delete user
        $mainT->delete();
        return ['message' => 'Titel deleted'];
    }
}
