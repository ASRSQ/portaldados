@extends('layouts.main')

@section('title','FGTS')

@section('content')
@php
    session(['cidade' => $cidade]);
@endphp
<div class="container">
    
    <h1>Lista de FGTS</h1>

    <form method="GET" action="{{ route('fgts.index') }}">
        <div class="form-group row">
            <label for="cidade" class="col-md-4 col-form-label text-md-right">Filtrar por cidade:</label>

            <div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="uf">UF:</label>
                        <select name="uf" id="uf" class="form-control">
                            <option value="">Todos</option>
                            @foreach ($ufs as $ufRow)
                                <option value="{{ $ufRow->uf }}" @if ($uf == $ufRow->uf) selected @endif>{{ $ufRow->uf }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <select name="cidade" id="cidade" class="form-control">
                            <option value="">Todas</option>
                            @if ($uf)
                                @foreach ($cidades->get($uf, collect()) as $cidadeRow)
                                    <option value="{{ $cidadeRow }}" @if (session('cidade', '') == $cidadeRow) selected @endif>{{ $cidadeRow }}</option>
                                @endforeach
                            @endif
                        </select>
                        
                        
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cidade</th>
                <th>CPF</th>
                <th>PIS</th>
                <th>Saldo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($fgts as $fgtsItem)
                <tr>
                    <td>{{ $fgtsItem->id }}</td>
                    <td>{{ $fgtsItem->nome }}</td>
                    <td>{{ $fgtsItem->cidade }}</td>
                    <td>{{ $fgtsItem->CPF2 }}</td>
                    <td>{{ $fgtsItem->pis }}</td>
                    <td>{{ $fgtsItem->saldo }}</td>
                  
                </tr>
            @empty
                <tr>
                    <td colspan="7">Nenhum registro encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $fgts->appends(['cidade' => $cidade, 'uf' => $uf])->links() }}

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
