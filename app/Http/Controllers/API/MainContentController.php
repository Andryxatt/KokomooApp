<?php

namespace App\Http\Controllers\API;

use App\MainContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
class MainContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @return MainContent[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return MainContent::all();
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title_english'=> 'required|string|max:191',
            'title_china'=> 'required|string|max:191',
            'photo'=>'required'
        ]);

        $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
        Image::make($request->photo)->save(public_path('img/content/').$name);
        MainContent::create([
            'title_english'=>  $request->title_english,
            'title_china'=>  $request->title_china,
            'photo'=> $name
        ]);
      return ['message'=>'succes'];
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
            'title_english'=> 'required|string|max:191',
            'title_china'=> 'required|string|max:191',
            'photo'=> 'required'
        ]);
        $mainCont = MainContent::where('main_content_id',$id)->get();

        $currentPhoto = $mainCont[0]->photo;

        if($request->photo != $currentPhoto){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('img/content/').$name);
            $request->merge(['photo'=> $name]);
            $upd=[
                'title_english'=>$request['title_english'],
                'title_china'=>$request['title_china'],
                'photo'=>$name
            ];
        }
        else {
            $upd=[
                'title_english'=>$request['title_english'],
                'title_china'=>$request['title_china'],
                'photo'=>$currentPhoto
            ];
        }

        MainContent::where('main_content_id', $id)->update($upd);

    }

    /**
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        $mainT = MainContent::findOrFail($id);
        //delete user
        $mainT->delete();
        return ['message' => 'Content deleted'];
    }
}
