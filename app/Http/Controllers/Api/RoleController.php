<?php

namespace App\Http\Controllers\Api;

use App\Models\Roles;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index(){
        $roles = Roles::latest()->paginate(5);

        return new RoleResource(true, 'List Role User', $roles);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $role = Roles::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return new RoleResource(true, 'Data berhasil ditambahkan', $role);
    }
}
