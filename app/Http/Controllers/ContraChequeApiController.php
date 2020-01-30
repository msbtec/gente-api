<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContraChequeApiController extends Controller
{
    public function index(){
        return [];

        return DB::table('persona.vw_contracheque_trabalhadores')
            ->where('cbo_trabalhador', '=', '411005')
            /* ->orWhere('mes_calculo', '=', '7')
            ->orWhere('ano_calculo', '=', '2017') */
            ->orderBy('ano_calculo', 'DESC')
            ->paginate(10);
    }

    public function show(Request $request){
        $data = $request->all();

        $results = DB::select( DB::raw("SELECT * FROM persona.vw_folha_pagamento_trabalhadores WHERE codigo_trabalhador = :cod AND ano_calculo = :ano AND mes_calculo= :mes"), array(
            'cod' => $data['codigo'],
            'ano' => $data['ano'],
            'mes' => $data['mes']
          ));

          return $results;
    }

    public function anos($cod){

        $results = DB::select( DB::raw("SELECT ano_calculo from persona.vw_folha_pagamento_trabalhadores where codigo_trabalhador= :cod GROUP BY ano_calculo ORDER BY ano_calculo DESC"), array(
            'cod' => $cod,
          ));

        return $results;
    }

    public function meses(Request $request){
        $data = $request->all();

        $results = DB::select( DB::raw("SELECT mes_calculo from persona.vw_folha_pagamento_trabalhadores where codigo_trabalhador= :cod and ano_calculo =:ano GROUP BY mes_calculo ORDER BY mes_calculo ASC"), array(
            'cod' => $data['codigo'],
            'ano' => $data['ano'],
          ));

        return $results;
    }
}
