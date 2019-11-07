<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContraChequeController extends Controller
{
    public function index(){
        return DB::table('persona.vw_contracheque_trabalhadores')
            ->where('cbo_trabalhador', '=', '411005')
            /* ->orWhere('mes_calculo', '=', '7')
            ->orWhere('ano_calculo', '=', '2017') */
            ->orderBy('ano_calculo', 'DESC')
            ->paginate(10);
    }
}
