<?php

namespace App\Http\Controllers;
use App\Models\todoscarros;
use Illuminate\Http\Request;
use App\Models\Carro;

class TodosCarrosController extends Controller
{
    public function index(Request $request){
        $query = todoscarros::query();
        $query->with('vendedor')->orderByDesc('vendedores.data_contratacao');
    
        // Filtrar por telefone ou telefone_descricao
        $query->where(function ($subquery) {
            $subquery->whereNotNull('Telefone')
                ->orWhereNotNull('Telefone_Descricao');
        });
    
        // Filtrar por origem FB
        if ($request->has('origem') && $request->origem != '') {
            $query->where('Origem', $request->origem);
        }
    
        $carros = $query->paginate(10);
        return view('todoscarros', ['carros' => $carros]);
    }
  
}
