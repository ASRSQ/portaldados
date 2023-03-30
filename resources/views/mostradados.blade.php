@extends('layouts.main')

@section('title','Principal')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ $vendedor }}</div>
            <div class="card-body">
                <ul>
                    <li>Origem: {{ $origem }}</li>
                    <li>Telefone: {{ $telefone }}</li>
                    <li>Outros Telefones: {{ $resultado[0]->Telefone_Descricao }}</li>
                    <li>Cidade: {{ $cidade }}</li>
                </ul>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="passar">
                    <button type="button" class="btn btn-success passar">
            
                        WhatsApp
                    </button>
                    <button class="btn btn-info passar"><i class="bi bi-chat-dots"></i>SMS</button>
                    <button class="btn btn-primary passar"><i class="bi bi-envelope"></i>E-MAIL</button>
                    <button class="btn btn-secondary passar"><i class="bi bi-facebook">Facebook</i></button>
            </div>
        </div>
        <br>
        <h3>Links</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Carro</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Link</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resultado as $result)
                    <tr>
                        <td class="car-name">{{ $result->Carro }}</td>
                        <td>{{ $result->Dia }}</td>
                        <td>{{ $result->Hora }}</td>
                        <td><a href="{{ $result->Link }}">Link</a></td>
                        <td>
                            <div id="{{ $result->id }}" style="display: inline-block; background-color: {{ $result->status ? 'green' : 'red' }}; width:30px; height:30px;" class="rounded-circle"></div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $resultado->links() }}
    </div>
    <div class="modal">
        <div class="modal-content">
            <h3>Você tem certeza que <span class="car-name"></span> é um carro?</h3>
            <div class="options">
                <button id="car-option">Sim</button>
                <button id="property-option">Imóvel</button>
                <button id="other-option">Outro</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // obtém o valor do token

    jQuery.noConflict();
    jQuery(document).ready(function($) {
        function confirmCar() {
            var carName = $(this).text();
            var modal = document.querySelector('.modal');
            var carOption = document.querySelector('#car-option');
            var propertyOption = document.querySelector('#property-option');
            var otherOption = document.querySelector('#other-option');
            var selectedOption;

            // exibe a janela modal
            modal.style.display = 'block';

            // exibe o nome do carro na janela modal
            document.querySelector('.car-name').textContent = carName;

            // define os listeners dos botões
            carOption.addEventListener('click', function() {
                selectedOption = 'sim';
                modal.style.display = 'none';
                // atualiza a tabela carro_olx
                console.log(carName + ' é um carro.');
            });
            propertyOption.addEventListener('click', function() {
                selectedOption = 'imovel';
                $.post("{{ route('moverDados') }}", { _token: "{{ csrf_token() }}" })
                    .done(function(data) {
                        alert("Dados movidos com sucesso!");
                    })
                    .fail(function(xhr, status, error) {
                        alert("Erro ao mover dados: " + error);
                    });
            });
            otherOption.addEventListener('click', function() {
                selectedOption = 'outro';
                modal.style.display = 'none';
                // atualiza a tabela outra_categoria_olx
                console.log(carName + ' não é um carro nem um imóvel.');
            });
        }

        $('.car-name').on('click', confirmCar);
    });
</script>
<style>
    .w-5{
        display:none;
    }
    .passar{
        padding: 10px;
        text-align: center;
    }
    .btn-circle {
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
    }
    .modal {
        display: none; /* oculta a janela modal por padrão */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }
    .modal-content {
        background-color: #fff;
        padding: 20px;
        max-width: 400px;
        margin: 20px auto;
        border-radius: 5px;
    }
    .options {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
    .options button {
        padding: 10px;
        border: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

@endsection