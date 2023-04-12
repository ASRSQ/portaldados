<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefeitura;

class PrefeituraController extends Controller
{

    public function index(Request $request)
{
    $uf = $request->input('uf');
    $cidade = $request->input('cidade');

    $query = Prefeitura::query();

    if ($uf) {
        $query->where('UF', $uf);

        // Filtra as cidades apenas para a UF selecionada
        $cidadesByUf = Prefeitura::select('UF', 'CIDADE')
            ->where('UF', $uf)
            ->distinct()
            ->orderBy('CIDADE')
            ->get();

        // Converte a coleção para um array com as cidades apenas
        $cidades = $cidadesByUf->pluck('CIDADE')->toArray();
    } else {
        $cidadesByUf = Prefeitura::select('UF', 'CIDADE')
            ->distinct()
            ->orderBy('CIDADE')
            ->get();

        // Agrupa as cidades por UF
        $cidades = $cidadesByUf->groupBy('UF')->toArray();
    }

    if ($cidade) {
        $query->where('CIDADE', $cidade);
    }

    $prefeituras = $query->paginate(25);

    $ufs = Prefeitura::select('UF')
        ->distinct()
        ->orderBy('UF')
        ->get();
    
    
    $cidades = $request->input('cidades', []);


    return view('prefeituras', compact('prefeituras', 'ufs', 'cidades', 'uf', 'cidade'));
}

    
    

    
    

    
}
