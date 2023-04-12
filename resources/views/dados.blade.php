@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Minha Lista de Botões') }}</div>
        <div class="card-body">
          <div class="buttons-list">
            <a href="/fgts">
              <img src="{{ asset('img/5a86f916aaca2708a6936152b235bd70.png') }}" alt="Botão FGTS" class="img-fluid">
            </a>
            <a href="/prefeituras">
              <img src="{{ asset('img/2799e9bea74aff46a31624ff09702f58.png') }}" alt="Botão Prefeituras" class="img-fluid">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
