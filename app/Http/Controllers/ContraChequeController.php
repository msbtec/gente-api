<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContraChequeController extends Controller
{
    public function index(){
        return DB::table('persona.vw_contracheque_trabalhadores')
            ->where('nome_trabalhador', 'like', '%SOUSA%')
            ->orWhere('mes_calculo', '=', '7')
            ->orWhere('ano_calculo', '=', '2017')
            ->paginate(10);
    }
}
