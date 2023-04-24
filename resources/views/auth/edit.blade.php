@extends('layouts.main')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Editar Dados Cadastrais</div>
            <div class="panel-body">
                <form action="{{ route('users.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary mb-3">Atualizar</button>
                    <a href="/" class="btn btn-default mb-3">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
