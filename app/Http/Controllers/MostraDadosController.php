<?php

namespace App\Http\Controllers;
use App\Models\MostraDados;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use App\Models\Imovel;

// //Load Composer's autoloader
// require 'vendor/autoload.php';

class MostraDadosController extends Controller
{
    public function moverDados()
{
    // Copiar dados da tabela carro_olx para a tabela imovel
    $carros = MostraDados::all();
    foreach ($carros as $carro) {
        $imovel = new Imovel;
        $imovel->Origem = $carro->Origem;
        $imovel->Imovel = $carro->Carro;
        $imovel->Vendedor = $carro->Vendedor;
        $imovel->Dia = $carro->Dia;
        $imovel->Hora = $carro->Hora;
        $imovel->Telefone = $carro->Telefone;
        $imovel->Telefone_Descricao = $carro->Telefone_Descricao;
        $imovel->Preço = $carro->Preço;
        $imovel->Cidade = $carro->Cidade;
        $imovel->CEP = $carro->CEP;
        $imovel->Descricao = $carro->Descricao;
        $imovel->Link = $carro->Link;
        $imovel->status = $carro->status;
        $imovel->cliente = $carro->cliente;
        $imovel->nomeiki = $carro->nomeiki;
        $imovel->save();
    }

    // Apagar dados da tabela carro_olx
    MostraDados::truncate();

    return redirect()->back();
}
    public function index(Request $request)
    {
        $id = $request->query('nome');
        $resultado = MostraDados::where('Vendedor', $id)->orderByDesc('Dia')->paginate(10);
        $vendedor = $resultado->isEmpty() ? '' : $resultado[0]->Vendedor;
        $origem = $resultado->isEmpty() ? '' : $resultado[0]->Origem;
        $telefone = $resultado->isEmpty() ? '' : $resultado[0]->Telefone;
        $cidade = $resultado->isEmpty() ? '' : $resultado[0]->Cidade;
        
        $resultado->appends(['nome' => $id]); // adiciona o parâmetro na paginação
        
        return view('mostradados', [
            'resultado' => $resultado,
            'vendedor' => $vendedor,
            'origem' => $origem,
            'telefone' => $telefone,
            'cidade' => $cidade,
        ]);
    }
    
   
}
