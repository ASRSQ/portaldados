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
    
        <form class="row mb-3">
            <div class="col-md-4">
                <label for="origem">Origem:</label>
                <select name="origem" id="origem" class="form-control">
                    <option value="">Todas</option>
                    <option value="FB" {{ request('origem') == 'FB' ? 'selected' : '' }}>Facebook</option>
                    <option value="IG" {{ request('origem') == 'IG' ? 'selected' : '' }}>Instagram</option>
                    <option value="OUTRA" {{ request('origem') == 'OUTRA' ? 'selected' : '' }}>Outra</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary mt-4">Filtrar</button>
            </div>
        </form>
    
        <div class="row">
            <div class="col-md-6"><strong>Nome vendedor</strong></div>
            <div class="col-md-6"><strong>Quantidade</strong></div>
        </div>
        @foreach($carros as $result)
            <div class="row">
                <div class="col-md-6">
                    <?php echo '<a href="mostradados?nome='.$result->vendedor.'">'.$result->vendedor.'</a>';?>
                </div>
                <div class="col-md-6">{{$result->qtd_carros}}</div>
            </div>
        @endforeach
        <div>
            <span class="passar">{{$carros->Links()}}</span>
        </div>
    </div><div class="container">
        <h2 class="text-center mb-4">Vendedores e Quantidades</h2>
       
        <form method="GET">
            <div class="row">
                <div class="col-md-4">
                    <label for="nome">Nome do vendedor:</label>
                    <input type="text" name="nome" id="nome" value="{{ request('nome') }}" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" id="telefone" class="form-control" value="{{ request('telefone') }}">
                </div>
                <div class="col-md-4">
                    <label for="origem_fb">Origem:</label>
                    <select name="origem_fb" id="origem_fb" class="form-control">
                        <option value="">Todas</option>
                        <option value="1" {{ request('origem_fb') == '1' ? 'selected' : '' }}>Facebook</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary" style="margin-top: 32px;">Filtrar</button>
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
            <span class="passar">{{ $carros->links() }}</span>
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
