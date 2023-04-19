@extends('layouts.main')

@section('title','Prefeituras')

@section('content')

    <div class="container">
        <h1>Prefeituras</h1>

        <form method="GET">
            <div class="form-group row">
                <label for="uf" class="col-sm-2 col-form-label">UF:</label>
                <div class="col-sm-4">
                    <select name="uf" id="uf" class="form-control">
                        <option value="">Todos</option>
                        @foreach($ufs as $ufItem)
                            <option value="{{ $ufItem->UF }}"{{ $ufItem->UF == request('uf') ? ' selected' : '' }}>{{ $ufItem->UF }}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
            
            <div class="form-group row">
                <label for="cidade" class="col-sm-2 col-form-label">Cidade:</label>
                <div class="col-sm-4">
                    <select name="cidade" id="cidade" class="form-control">
                        <option value="">Todas</option>
                        @if ($uf)
                            @foreach ($cidades as $cidadeItem)
                                <option value="{{ $cidadeItem }}"{{ $cidadeItem == request('cidade') ? ' selected' : '' }}>{{ $cidadeItem }}</option>
                            @endforeach
                        @else
                            @foreach ($cidades as $uf => $cidadesByUf)
                                <optgroup label="{{ $uf }}">
                                    @foreach ($cidadesByUf as $cidadeItem)
                                        <option value="{{ $cidadeItem }}" data-uf="{{ $uf }}"{{ $cidadeItem == request('cidade') ? ' selected' : '' }}>{{ $cidadeItem }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        @endif
                    </select>
                    
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Cidade</th>
                    <th>UF</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prefeituras as $prefeitura)
                    <tr>
                        <td>{{ $prefeitura->NOME_A }}</td>
                        <td>{{ $prefeitura->CPF }}</td>
                        <td>{{ $prefeitura->CIDADE }}</td>
                        <td>{{ $prefeitura->UF }}</td>
                        <td>
                            <a href="/search/{{ $prefeitura->NOME_A }}">Ver mais</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $prefeituras->appends(['cidade' => $cidade ?? '', 'uf' => $uf ?? ''])->links() }}

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
