<?php

namespace App\Http\Controllers\Api;

use App\Models\UserRoles;
use App\Http\Resource\UserRoleResource;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    // public function index(){
    //     $user_role = UserRoles::latest()->paginate(5);
    
    //     return new UserRoleResource(true, 'List ')
    // }

    public function store(Request $request){
        $user_role = UserRoles::create([
            'user_id' => $request->userId,
            'role_id' => $request->roleId
        ]);
        return new UserRoleResource(true, 'Data berhasil ditambahkan', $user_role);
    }
}
