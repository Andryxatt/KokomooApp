<?php

namespace App\Http\Controllers\API;

use App\Agency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        $agency = Agency::all();
        return ['agency'=>$agency];
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title_english'=> 'required|string|max:100',
            'title_china'=> 'required|string|max:100',
            'text_english'=> 'required|',
            'text_china'=> 'required|'
        ]);
        return Agency::create([
            'title_english' =>$request['title_english'],
            'title_china' =>$request['title_china'],
            'text_english' =>$request['text_english'],
            'text_china' =>$request['text_china'],
            'help_text_c'=>$request['help_text_c'],
            'help_text_e'=>$request['help_text_e']
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
        $agency = Agency::findOrFail($id);
        $this->validate($request,[
            'title_english'=> 'required|string|max:100',
            'title_china'=> 'required|string|max:100',
            'text_english'=> 'required|',
            'text_china'=> 'required|'
        ]);
        $agency->update($request->all());

        return ['message'=> 'Updated agency info'];
    }

    /**
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        $agency = Agency::where('agency_id',$id);
        //delete user
        $agency->delete();
        return ['message' => 'Agency deleted'];
    }
}
