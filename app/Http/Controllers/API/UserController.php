<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    public function __construct() {
        $this->middleware(['auth:api', 'isAdmin'], ['except' => ['index']]);
    }

    public function index()
    {
        $users = User::all();
        return $this->sendResponse(UserResource::collection($users), 'All Users');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name'  => 'required|max:100',
            'last_name'  => 'required|max:100',
            'email'       => 'required|email|unique:users',
            'phone'       => 'required|unique:users',
            'age'         => 'required|numeric',
            'type'        => 'required|max:100',
            'group'    => 'exists:App\Models\Group,id',
            'password'    => 'required|confirmed|min:8',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'type' => $request->type,
            'group_id' => $request->group,
            'password' => bcrypt($request->password)
         ]);
        
        return $this->sendResponse(new UserResource($user), 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return $this->sendError('Not found.', ['error'=>'Data not found']);
        }

        return $this->sendResponse(new UserResource($user), 'User founded successfully');
    }


    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),[
            'first_name'  => 'required|max:100',
            'last_name'  => 'required|max:100',
            'email'       => 'required|email|unique:users,email,'.$user->id,
            'phone'       => 'required|unique:users,phone,'.$user->id,
            'age'         => 'required|numeric',
            'type'        => 'required|max:100',
            'group'    => 'exists:App\Models\Group,id',
            'password'    => 'confirmed|min:8|nullable'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'type' => $request->type,
            'group_id' => $request->group,
            'password' => (!empty($request->password)) ? bcrypt($request->password) : $user->password
        ]);
        
        return $this->sendResponse(new UserResource($user), 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->sendResponse(null, 'User deleted successfully');
    }
}
