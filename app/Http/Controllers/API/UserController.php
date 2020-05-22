<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Http\Request;

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
        $users = User::with('roles')->get();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'sometimes|string|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'bio' => ($request->bio),
            'photo' => ($request->photo)
        ]);
        $role = Role::where('name',$request->roles)->first();
        $user->roles()->attach($role);
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
    
    public function profile()
    {
        return auth('api')->user();
    }

    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|required|min:6'
        ]);
        $currentPhoto = $user->photo;
        if($request->photo != $currentPhoto){
            $extension = time().'.'.explode('/', mime_content_type($request->photo))[1];
            \Image::make($request->photo)->save(public_path('img/profile/').$extension);
            $request->merge(['photo' => $extension]);

            $userPhoto = public_path('img/profile/').$currentPhoto;
            \Debugbar::info($userPhoto);
            // \DebugBar::info(file_exists($userPhoto));
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
                \Debugbar::info('Entro');
            }

        }
        if(!empty($request->password)){
            $password = bcrypt($request->password);
            $request->merge(['password' => $password]);
        }
        $user->update($request->all());
        return ['message' => 'Success'];
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
        $user = User::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6'
            ]);
        $user->update($request->all());
        $role = Role::where('name',$request->roles)->first();
        $user->roles()->sync($role);
        // $user->roles()->attach($role);
        // \Debugbar::info($request->roles);

        return ['message' => 'User updated'];
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

        $user->roles()->detach();
        $user->delete();

        return ['message' => 'User deleted'];
    }
}
