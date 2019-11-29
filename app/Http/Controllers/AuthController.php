<?php

namespace App\Http\Controllers;

// use App\User;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(/* Request $request */ $cpf)
    {
        // $loginData = $request->validate([
        //     'email' => 'email|required',
        //     'password' => 'required'
        // ]);

        // if(!auth()->attempt($loginData)){
        //     return response(['message'=>'Invalid credentials']);
        // }

        // $accessToken = auth()->user()->createToken('authToken')->accessToken;

        // return response(['user'=>auth()->user(), 'access_token' => $accessToken]);

        // $data = $request->all();
        // $cpf = $data['cpf'];

        $results = DB::select( 
            DB::raw(
                "SELECT * FROM persona.vw_folha_pagamento_trabalhadores WHERE cpf_trabalhador = :cpf LIMIT 1"
            ), array(
                'cpf' => $cpf
          ));

        return $results;
    }
}
