<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::latest()->paginate(9);
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|string|max:100',
            'email'=> 'required|string|email|max:191|unique:users',
            'password'=> 'required|string|min:5',
        ]);
        return User::create([
           'name' =>$request['name'],
            'email' =>$request['email'],
            'password' =>Hash::make($request['password']),
            'type' =>$request['type'],
            'bio' =>$request['bio'],
            'photo' =>$request['photo'],
        ]);
    }
    public function updateProfile(Request $request)
    {
        $user =  auth('api')->user();

        $this->validate($request,[
            'name'=> 'required|string|max:100',
            'email'=> 'required|string|email|max:191|unique:users,email, '.$user->id,
            'password'=> 'sometimes|min:6',
        ]);

        $currentPhoto = $user->photo;

        if($request->photo != $currentPhoto){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('img/profile/').$name);
            $request->merge(['photo'=> $name]);
            $userPhoto = public_path('img/profile/').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }


        }
        if(!empty($request->password)){
            $request->merge(['password'=> Hash::make($request['password'])]);
        }

        $user->update($request->all());
        return ['message'=>'succses!'];
    }
    public function profile()
    {
       return  auth('api')->user();
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

        $user = User::findOrFail($id);
        $this->validate($request,[
            'name'=> 'required|string|max:100',
            'email'=> 'required|string|email|max:191|unique:users,email, '.$user->id,
            'password'=> 'sometimes|min:6',
        ]);
        $user->update($request->all());

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
        $user = User::findOrFail($id);
        //delete user
        $user->delete();
        return ['message' => 'User deleted'];
    }
}
