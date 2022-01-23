<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Resources\GroupResource;

class GroupController extends BaseController
{
    public function index()
    {
        $groups = Group::all();
        return $this->sendResponse(GroupResource::collection($groups), 'All Groups');
    }

    public function show($id)
    {
        $group = Group::find($id);
        if (is_null($group)) {
            return response()->json('Data not found', 404); 
        }

        return $this->sendResponse(new GroupResource($group), 'Group founded successfully');
    }
}
