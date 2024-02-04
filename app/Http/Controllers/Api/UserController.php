<?php

namespace App\Http\Controllers\Api;

use App\Models\Users;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users = Users::latest()->paginate(5);

        return new UserResource(true, 'List Data Users', $users);
    }   

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        //Upload Image to Directory
        $image = $request->file('image');
        $image->storeAs('public/users', $image->hashName());

        //Create User
        $user = Users::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'image' => $image->hashName()
        ]);

        return new UserResource(true, 'Data berhasil ditambahkan', $user);
    }
}
