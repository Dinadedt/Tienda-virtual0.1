<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// MODULO DE VALIDACIONES DE LARAVE
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getUser(Request $request){
        return response()->json(['message' => 'Get one user', 'user' => 'Fernando Aguilar']);
    }



    public function createUser(Request $request)
        {
        
            $data = $request->all();

            //VALIDAR EL REQUEST DATA
            $validator = validator::make($data, [
                'name' => 'required|min:3|max:25',
                'lastname' => 'required|min:2|max:25',
                'email' => 'required|email',
                'password' => 'required'
                
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'validation error',
                    'error' => $validator->errors()
                ], 422);
            }

        return response()->json([
            'message' => 'Hello World',
            'data' => $request->all(),
        ]);
    }

    public function updateUser(Request $request, $id){
        return response()->json([
            'message' => 'update',
            'data' => $request->all(),
            'id' => $id,
        ]);
    }

    public function deleteUser(Request $request, $id){
        return response()->json([
            'message' => 'User deleted',
        ]);
    }
}