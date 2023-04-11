@extends('layouts.main')

@section('title','Carros')


@section('content')
    <?php
            $Vendedores='';
            foreach ($carros as $value) {
                $Vendedores.="$value->Vendedor";
                $Vendedores.=',';
            }
            $a=explode(",",$Vendedores);
            $distinct = array_unique($a);
    ?>
  <div class="container">
    <h2 class="text-center mb-4">Vendedores e Quantidades</h2>

    <form method="GET">
        <div class="row">
            <div class="col-md-4">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="telefone" id="telefone" value="true" @if(request('telefone')) checked @endif>
                    <label class="form-check-label" for="telefone">Filtrar por telefone</label>
                </div>
                <div class="form-group mt-2">
                    <label for="origem">Filtrar por origem:</label>
                    <select name="origem" id="origem" class="form-control">
                        <option value="">Selecionar</option>
                        <option value="FB" @if(request('origem') == 'FB') selected @endif>Facebook</option>
                    
                        <option value="OLX" @if(request('origem') == 'OLX') selected @endif>OLX</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary mt-4">Filtrar</button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-md-6"><strong>Nome vendedor</strong></div>
        <div class="col-md-6"><strong>Quantidade</strong></div>
    </div>
    @foreach($carros as $result)
        <div class="row">
            <div class="col-md-6">
                <a href="mostradados?nome={{ $result->vendedor }}">{{ $result->vendedor }}</a>
            </div>
            <div class="col-md-6">{{ $result->qtd_carros }}</div>
        </div>
    @endforeach
    <div>
        <span class="passar">{{ $carros->appends(request()->query())->links() }}</span>
    </div>
</div>






    <style>
        .w-5{
            display:none;
        }
        .passar{
            padding: 10px;
        }
    </style>
@endsection
